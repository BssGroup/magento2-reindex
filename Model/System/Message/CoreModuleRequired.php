<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 * @category   BSS
 * @package    Bss_Reindex
 * @author     Extension Team
 * @copyright  Copyright (c) 2015-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */

namespace Bss\Reindex\Model\System\Message;

/**
 * Class CoreModuleRequired
 * @package Bss\Reindex\Model\System\Message
 */
class CoreModuleRequired implements \Magento\Framework\Notification\MessageInterface
{
    const MESSAGE_IDENTITY = 'bss_core_module_required';

    /**
     * @var \Bss\Reindex\Helper\Data
     */
    private $helper;

    /**
     * CoreModuleRequired constructor.
     * @param \Bss\Reindex\Helper\Data $helper
     */
    public function __construct(
        \Bss\Reindex\Helper\Data $helper
    )
    {
        $this->helper = $helper;
    }

    /**
     * Retrieve unique system message identity
     *
     * @return string
     */
    public function getIdentity()
    {
        return self::MESSAGE_IDENTITY;
    }

    /**
     * Check whether the system message should be shown
     *
     * @return bool
     */
    public function isDisplayed()
    {
        // The message will be shown
        return !$this->helper->isCoreModuleEnabled();
    }

    /**
     * Retrieve system message text
     *
     * @return string
     */
    public function getText()
    {
        $moduleName = $this->helper->getModuleName();
        $text = __(
            '<b>Your module "%1" can not work without BSS Commerce\'s 
                Core Module included in the package</b>',
            $moduleName);
        $script =
            '<script>
                setTimeout(function() {
                    jQuery("button.message-system-action-dropdown").trigger("click");
                }, 100);
            </script>';
        return $text . $script;
    }

    /**
     * Retrieve system message severity
     * Possible default system message types:
     * - MessageInterface::SEVERITY_CRITICAL
     * - MessageInterface::SEVERITY_MAJOR
     * - MessageInterface::SEVERITY_MINOR
     * - MessageInterface::SEVERITY_NOTICE
     *
     * @return int
     */
    public function getSeverity()
    {
        return self::SEVERITY_MAJOR;
    }
}