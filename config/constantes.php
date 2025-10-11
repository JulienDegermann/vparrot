<?php

/**
 * Files with all global constantes
 */

// =============================================================================
/**
 * Directories
 */

/**
 * @var string ROOT_DIR
 */
define('ROOT_DIR', __DIR__ . '/../');

/**
 * @var string UPLOADS_DIR
 */
define('UPLOADS_DIR', '/uploads');

// =============================================================================
/**
 * Regex -- input validation
 */

/**
 * @var string MessageRegex
 */
define('MESSAGE_REGEX', '/^[a-zA-Z0-9\s()\-\'?:.,!@\/\"\p{L}]{2,}$/u');

/**
 * @var string CommentRegex
 */
define('COMMENT_REGEX', '/^[a-zA-Z0-9\s\-,?!.\p{L}]{5,255}$/u');

/**
 * @var string PasswordRegex
 */
define('PASSWORD_REGEX', '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{12,}$/');

/**
 * @var string NameRegex (firstname / lastname)
 */
define('NAME_REGEX', '/^[a-zA-Z\s\-\p{L}]{2,255}$/u');

/**
 * @var string EmailRegex
 */
define('EMAIL_REGEX', '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-]+)*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)$/');

/**
 * @var string PhoneRegex
 */
define('PHONE_REGEX', '/^(?:(?:\+33\s?|0)(?:[1-5]|6|7|9)(?:[\s.-]?\d{2}){4})$/');
