<?php


const ADMIN_GUARD = 'admin-api';
const USER_GUARD = 'user-api';

define('LOGIN_TRANSACTION', 10001);

define('LOGOUT_TRANSACTION', 10002);

define('ERROR_RESPONSE', false);

define('SUCCESS_RESPONSE', true);

define('SUCCESS_STATUS', true);

define('FAILURE_STATUS', false);

define('INACTIVE', 0);

define('ACTIVE', 1);

define('SUCCESS', 1);

define('ERROR', 0);

define('ENTERNAL_ERROR', 500);

define('USER_NOT_FOUND', 100);

define('USER_NOT_ACTIVE', 101);

define('NOT_AUTHORIZED_ACCESS', 102);

define('VALIDATION_EXCEPTION', 103);

define('RESOURCE_MANIPULATION', 103);

define('UNAUTHENTICATED_ERROR', 106);

define('UNKNOWN_DATABASE', 105);

/**
 * error : UNKNOWN_RELATION
 * Http status code
 */
define('UNKNOWN_RELATION', 107);

/**
 * error : DATABASE_CONNECTION_ERROR
 * Http status code
 */
define('DATABASE_CONNECTION_ERROR', 112);

/**
 * error :  INVALID INPUT
 * Http status code
 */
define('INVALID_INPUT', 106);

/**
 * error : database backup
 * Http status code
 */
define('BACKUP_ERROR', 1105);
/**
 * error : resource not found
 * Http status code
 */
define('RESOURCE_NOT_FOUND', 404);
/**
 * error : could not delete the resource 'cause it has
 * children
 * Http status code
 */
define('DELETE_CHILDREN_ERROR', 1106);
/**
 * error : invalid access code
 *
 * Http status code
 */
define('INVALID_ACCESS_CODE', 1107);
/**
 * error : error while creating database
 *
 * Http status code
 */
define('CREATE_DATABASE_ERROR', 1108);
/**
 *
 * error : INVALID TOKEN
 *
 * Http status code
 */
define('INVALID_TOKEN', 1109);

/**
 *
 * error : UPLOADING_ERROR
 *
 * Http status code
 */
define('UPLOADING_ERROR', 408);

/**
 *
 * Admin topic
 */
define('ADMIN_TOPIC', 'admins');
/**
 *
 * customers-android topic
 */
define('CUSTOMERS_ANDROID_TOPIC', 'customers-android');
/**
 *
 * customers-ios topic
 */
define('CUSTOMERS_IOS_TOPIC', 'customers-ios');
/**
 *
 * customers topic
 */
define('CUSTOMERS_TOPIC', 'customers');
/**
 *
 * TechnicalSupport GUARD
 */
define('TECHNICAL_SUPPORTS_GUARD', 'technical-supports-api');
/**
 *
 * payment methode online
 */
define('ONLINE_PAYMENT_METHODE', 'online');
/**
 *
 * payment methode on_delivery
 */
define('ON_DELICERY_PAYMENT_METHODE', 'on_delivery');
/**
 *
 * technical-support topic
 */
define('TECHNICAL_SUPPORT_TOPIC', 'support');
/**
 *
 * tap-payment (refunds) url
 */
define('REFUNDS_URI', 'https://api.tap.company/v2/refunds');
/**
 *
 * tap-payment (refunds)
 */
define('TAP_PAYMENT_TOKEN', 'sk_test_zs0uWTBFwIDY9en2oAtZXcM3');
/**
 *
 * error : ORDER_NOT_FOUND_FINANCIAL
 *
 * Http status code
 */
define('ORDER_NOT_FOUND_FINANCIAL', 1100);
/**
 * restaurant guard
 *
 * @author Nawa
 */
define('RESTAURANT_GUARD', 'restaurant-api');


/**
 * technical support guard
 *
 * @author Nawa
 */
define('TECHNICAL_SUPPORT_GUARD', 'technical-support-api');


/**
 * DELIVERY_GUARD
 */
define('DELIVERY_GUARD', 'delivery-api');
/**
 *
 * error : INVALID_TRANSACTION_ID
 *
 * Http status code
 */
define('INVALID_TRANSACTION_ID', 1101);

/**
 *
 * error : CAN_NOT_GET_ACCOUNT_CODE
 *
 * Http status code
 */
define('CAN_NOT_GET_ACCOUNT_CODE', 1102);

/**
 *
 * error : ACCOUNT_NOT_FOUND
 *
 * Http status code
 */
define('ACCOUNT_NOT_FOUND', 1103);

/**
 *
 * error : ACCOUNT_NOT_FOUND
 *
 * Http status code
 */
define('NOT_ENOUGH_CREDIT', 1104);



define('STORAGE_FILES_PATH_PREFIX', 'reports/');

