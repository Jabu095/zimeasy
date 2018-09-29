{*
 * 2018 Touchize Sweden AB.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to prestashop@touchize.com so we can send you a copy immediately.
 *
 *  @author    Touchize Sweden AB <prestashop@touchize.com>
 *  @copyright 2018 Touchize Sweden AB
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of Touchize Sweden AB
 *}
 
    <script 
      type="text/javascript"
      src="{$scriptPath|escape:'htmlall':'UTF-8'}/js/slq.js"
    ></script>
    <script type="text/javascript">
      (function(w) {
          w.slqcore = new Slq.StoreFront({$touchfrontConfig|@json_encode|escape:'quotes':'UTF-8' nofilter}).start("#sq-base");
      })(window);
    </script>
    {* No escaping since admin user is allowed to enter pure HTML here. *}
    {if isset($body_html) && $body_html}
      {$body_html nofilter}
    {/if}
</body>
</html>
