<?php

/* @PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig */
class __TwigTemplate_5199f7847be8b4f29210e0b669a3200af2e298cffef3ed9572b2ee8fdf37685c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 25);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 28
        list($context["generalForm"], $context["paginationForm"], $context["pageForm"], $context["stockForm"]) =         array($this->getAttribute(($context["form"] ?? null), "general", array()), $this->getAttribute(($context["form"] ?? null), "pagination", array()), $this->getAttribute(($context["form"] ?? null), "page", array()), $this->getAttribute(($context["form"] ?? null), "stock", array()));
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 30
    public function block_content($context, array $blocks = array())
    {
        // line 31
        echo "    <div class=\"container\">
        ";
        // line 32
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', array("attr" => array("class" => "form", "id" => "configuration_form")));
        echo "
        <div class=\"row\">
            ";
        // line 35
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_general.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 35)->display($context);
        // line 36
        echo "            ";
        // line 37
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_page.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 37)->display($context);
        // line 38
        echo "        </div>

        <div class=\"row\">
            ";
        // line 42
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_stock.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 42)->display($context);
        // line 43
        echo "            ";
        // line 44
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Configure/ShopParameters/Blocks:product_preferences_pagination.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 44)->display($context);
        // line 45
        echo "        </div>
        ";
        // line 46
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
    </div>
";
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/product_preferences.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 53,  77 => 51,  74 => 50,  67 => 46,  64 => 45,  61 => 44,  59 => 43,  56 => 42,  51 => 38,  48 => 37,  46 => 36,  43 => 35,  38 => 32,  35 => 31,  32 => 30,  28 => 25,  26 => 28,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", "/Library/WebServer/Documents/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/product_preferences.html.twig");
    }
}
