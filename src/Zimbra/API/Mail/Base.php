<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Mail;

use Zimbra\API\Mail;

/**
 * Base is a abstract class which allows to connect Zimbra API mail functions via SOAP
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
abstract class Base extends Mail implements MailInterface
{
    /**
     * Base constructor
     *
     * @param string $location The Zimbra api soap location.
     */
    public function __construct($location)
    {
        $this->_location = $location;
        $this->_namespace = 'urn:zimbraMail';
    }
}
