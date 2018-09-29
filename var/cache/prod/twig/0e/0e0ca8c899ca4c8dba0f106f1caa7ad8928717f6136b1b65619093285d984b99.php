<?php

/* PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_stock.html.twig */
class __TwigTemplate_84cc88c2f3f1e867ef45e84c461400b2c28948f605815677c8f754b42902eafb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        echo "
";
        // line 27
        echo "
<div class=\"col\">
    <div class=\"card\" id=\"configuration_fieldset_stock\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">shop</i> ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Products stock", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
        </h3>
        <div class=\"card-body\">
            <div class=\"form-group\">
                ";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow ordering of out-of-stock products", array(), "Admin.Shopparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("By default, the Add to Cart button is hidden when a product is unavailable. You can choose to have it displayed in all cases.", array(), "Admin.Shopparameters.Help")), "method"), "html", null, true);
        echo "
                ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "allow_ordering_oos", array()), 'errors');
        echo "
                ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "allow_ordering_oos", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                <label class=\"form-control-label\">
                    ";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable stock management", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                </label>
                ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "stock_management", array()), 'errors');
        echo "
                ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "stock_management", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                <label class=\"form-control-label\">
                    ";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Label of in-stock products", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                </label>
                ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "stock_management", array()), 'errors');
        echo "
                ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "in_stock_label", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                <label class=\"form-control-label\">
                    ";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Label of out-of-stock products with allowed backorders", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                </label>
                ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_allowed_backorders", array()), 'errors');
        echo "
                ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_allowed_backorders", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                <label class=\"form-control-label\">
                    ";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Label of out-of-stock products with denied backorders", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                </label>
                ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_denied_backorders", array()), 'errors');
        echo "
                ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_denied_backorders", array()), 'widget');
        echo "
            </div>
            <div class=\"form-group\">
                ";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery time of in-stock products", array(), "Admin.Shopparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advised for European merchants to be legally compliant (eg: Delivered within 3-4 days)", array(), "Admin.Shopparameters.Help")), "method"), "html", null, true);
        echo "
                ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "delivery_time", array()), 'errors');
        echo "
                ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "delivery_time", array()), 'widget');
        echo "
                <small class=\"form-text\">";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Leave empty to disable", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "</small>
            </div>
            <div class=\"form-group\">
                ";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery time of out-of-stock products with allowed backorders", array(), "Admin.Shopparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advised for European merchants to be legally compliant (eg: Delivered within 5-7 days)", array(), "Admin.Shopparameters.Help")), "method"), "html", null, true);
        echo "
                ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_delivery_time", array()), 'errors');
        echo "
                ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_delivery_time", array()), 'widget');
        echo "
                <small class=\"form-text\">";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Leave empty to disable", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "</small>
            </div>
            <div class=\"form-group\">
                ";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default pack stock management", array(), "Admin.Shopparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("When selling packs of products, how do you want your stock to be calculated?", array(), "Admin.Shopparameters.Help")), "method"), "html", null, true);
        echo "
                ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "pack_stock_management", array()), 'errors');
        echo "
                ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "pack_stock_management", array()), 'widget');
        echo "
            </div>
        </div>
        <div class=\"card-footer\">
            <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_stock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 87,  157 => 82,  153 => 81,  149 => 80,  143 => 77,  139 => 76,  135 => 75,  131 => 74,  125 => 71,  121 => 70,  117 => 69,  113 => 68,  107 => 65,  103 => 64,  98 => 62,  91 => 58,  87 => 57,  82 => 55,  75 => 51,  71 => 50,  66 => 48,  59 => 44,  55 => 43,  50 => 41,  43 => 37,  39 => 36,  35 => 35,  28 => 31,  22 => 27,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_stock.html.twig", "/Library/WebServer/Documents/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig");
    }
}
