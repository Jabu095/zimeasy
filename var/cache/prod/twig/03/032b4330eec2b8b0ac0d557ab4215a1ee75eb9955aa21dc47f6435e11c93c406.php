<?php

/* PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_page.html.twig */
class __TwigTemplate_c049683426842b76460c43541fc5aea21c02853221b08e1f979b274caa2a1f44 extends Twig_Template
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
    <div class=\"card\" id=\"configuration_fieldset_fo_product_page\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">shopping_basket</i> ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Product page", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
        </h3>
        <div class=\"card-body\">
            <div class=\"card-text\">
                <div class=\"form-group\">
                    <label class=\"form-control-label\">
                        ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display available quantities on the product page", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                    </label>
                    ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_quantities", array()), 'errors');
        echo "
                    ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_quantities", array()), 'widget');
        echo "
                </div>
                <div class=\"form-group\">
                    ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display remaining quantities when the quantity is lower than", array(), "Admin.Shopparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set to \"0\" to disable this feature.", array(), "Admin.Shopparameters.Help")), "method"), "html", null, true);
        echo "
                    ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_last_quantities", array()), 'errors');
        echo "
                    ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_last_quantities", array()), 'widget');
        echo "
                </div>
                <div class=\"form-group\">
                    <label class=\"form-control-label\">
                        ";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display unavailable product attributes on the product page", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                    </label>
                    ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_unavailable_attributes", array()), 'errors');
        echo "
                    ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_unavailable_attributes", array()), 'widget');
        echo "
                </div>
                <div class=\"form-group\">
                    ";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display the \"add to cart\" button when a product has attributes", array(), "Admin.Shopparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display or hide the \"add to cart\" button on category pages for products that have attributes forcing customers to see product details.", array(), "Admin.Shopparameters.Help")), "method"), "html", null, true);
        echo "
                    ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "allow_add_variant_to_cart_from_listing", array()), 'errors');
        echo "
                    ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "allow_add_variant_to_cart_from_listing", array()), 'widget');
        echo "
                </div>
                <div class=\"form-group\">
                    <label class=\"form-control-label\">
                        ";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Separator of attribute anchor on the product links", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                    </label>
                    ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "attribute_anchor_separator", array()), 'errors');
        echo "
                    ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "attribute_anchor_separator", array()), 'widget');
        echo "
                </div>
                <div class=\"form-group\">
                    <label class=\"form-control-label\">
                        ";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display discounted price", array(), "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
                    </label>
                    ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_discount_price", array()), 'errors');
        echo "
                    ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_discount_price", array()), 'widget');
        echo "
                    <small class=\"form-text\">";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("In the volume discounts board, display the new price with the applied discount instead of showing the discount (ie. \"-5%\").", array(), "Admin.Shopparameters.Help"), "html", null, true);
        echo "</small>
                </div>
            </div>
        </div>
        <div class=\"card-footer\">
            <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 78
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
        return "PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 78,  126 => 72,  122 => 71,  118 => 70,  113 => 68,  106 => 64,  102 => 63,  97 => 61,  90 => 57,  86 => 56,  82 => 55,  76 => 52,  72 => 51,  67 => 49,  60 => 45,  56 => 44,  52 => 43,  46 => 40,  42 => 39,  37 => 37,  28 => 31,  22 => 27,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_page.html.twig", "/Library/WebServer/Documents/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig");
    }
}
