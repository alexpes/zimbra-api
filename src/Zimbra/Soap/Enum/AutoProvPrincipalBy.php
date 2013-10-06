<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Enum;

/**
 * AutoProvPrincipalBy class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class AutoProvPrincipalBy
{
    /**
     * Constant for value 'dn'
     * @return string 'dn'
     */
    const DN = 'dn';
    /**
     * Constant for value 'name'
     * @return string 'name'
     */
    const NAME = 'name';

    /**
     * Return true if value is allowed
     * @param  string $by
     * @return bool true|false
     */
    public static function isValid($by)
    {
        $validValues = array(
            self::DN,
            self::NAME,
        );
        return in_array($by, $validValues);
    }
}
