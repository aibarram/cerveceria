<?php
	class QQN {
		/**
		 * @return QQNodeBeer
		 */
		static public function Beer() {
			return new QQNodeBeer('beer', null, null);
		}
		/**
		 * @return QQNodeBrewery
		 */
		static public function Brewery() {
			return new QQNodeBrewery('brewery', null, null);
		}
		/**
		 * @return QQNodeIngredient
		 */
		static public function Ingredient() {
			return new QQNodeIngredient('ingredient', null, null);
		}
		/**
		 * @return QQNodeQualification
		 */
		static public function Qualification() {
			return new QQNodeQualification('qualification', null, null);
		}
		/**
		 * @return QQNodeReview
		 */
		static public function Review() {
			return new QQNodeReview('review', null, null);
		}
		/**
		 * @return QQNodeScale
		 */
		static public function Scale() {
			return new QQNodeScale('scale', null, null);
		}
		/**
		 * @return QQNodeType
		 */
		static public function Type() {
			return new QQNodeType('type', null, null);
		}
	}