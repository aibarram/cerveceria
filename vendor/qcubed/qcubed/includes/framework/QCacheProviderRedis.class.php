<?php
	
	/**
	 * Cache provider based on Redis.
	 *
	 * This adapter needs the predis/predis library to be installed.
	 * Please see http://github.com/nrk/predis
	 */
	class QCacheProviderRedis extends QAbstractCacheProvider {
		/** @var Predis\Client */
		protected $objPredisClient;

		/**
		 * Construct the Memcache based cache provider
		 *
		 * @param array $objOptionsArray array of server options. Each item in the array contains an associative
		 *                               arrays with options for the server to add to memcache
		 *
		 * @throws QCallerException
		 */
		public function __construct($objOptionsArray) {
			// There must be keys named 'parameters' and 'options' in the configuration
			if(!array_key_exists('parameters', $objOptionsArray) || !array_key_exists('options', $objOptionsArray)) {
				// Needed keys do not exist
				throw new QCallerException('The configuration parameters for creating predis client in the configuration file are wrong. The config array must contain the "parameters" and "options" keys');
			}

			if(class_exists('Predis\Client')) {
				// We have the predis client
				$this->objPredisClient = new Predis\Client($objOptionsArray['parameters'], $objOptionsArray['options']);
			} else {
				throw new QCallerException('QCacheProviderRedis expects the Predis library to be installed. Please see http://github.com/nrk/predis for more.');
			}
		}

		/**
		 * Get the object that has the given key from the cache
		 * @param string $strKey the key of the object in the cache
		 * @return object
		 */
		public function Get($strKey) {
			return unserialize($this->objPredisClient->get($strKey));
		}

		/**
		 * Set the object into the cache with the given key and (optional) expire duration
		 *
		 * Refer documentation (in docs/Caching/Redis.md) to learn about expiration for redis.
		 *
		 * @param string $strKey                the key to use for the object
		 * @param string $objValue              the object to put in the cache
		 * @param null   $intExpireAfterSeconds Number of seconds after which the key will be expired
		 *                                      If this value is numeric, key will expire in that many seconds
		 *                                      If the value is null and _REDIS_CACHE_PROVIDER_DEFAULT_TTL_ is not set or is negative, then the key will not expire
		 *                                      If _REDIS_CACHE_PROVIDER_DEFAULT_TTL_ is set and is positive, then key will expire in that many seconds.
		 *
		 * @return void
		 */
		public function Set($strKey, $objValue, $intExpireAfterSeconds = null) {
			if ($intExpireAfterSeconds !== null) {
				$this->objPredisClient->set($strKey, serialize($objValue), 'ex', (int)$intExpireAfterSeconds);
			} else {
				if(defined('_REDIS_CACHE_PROVIDER_DEFAULT_TTL_') && _REDIS_CACHE_PROVIDER_DEFAULT_TTL_ > 0) {
					$this->objPredisClient->set($strKey, serialize($objValue), 'ex', (int)_REDIS_CACHE_PROVIDER_DEFAULT_TTL_);
				} else {
					$this->objPredisClient->set($strKey, serialize($objValue));
				}
			}
		}

		/**
		 * Delete the object that has the given key from the cache
		 * @param string $strKey the key of the object in the cache
		 * @return void
		 */
		public function Delete($strKey) {
			$this->objPredisClient->del([$strKey]);
		}

		/**
		 * Invalidate all the objects in the cache
		 * @return void
		 */
		public function DeleteAll() {
			$this->objPredisClient->flushdb();
		}

		/**
		 * Let other redis methods work
		 *
		 * @param $commandID
		 * @param $arguments
		 *
		 * @return mixed
		 */
		public function __call($commandID, $arguments) {
			return $this->objPredisClient->executeCommand(
				$this->objPredisClient->createCommand($commandID, $arguments)
			);
		}
	}