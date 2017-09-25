<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_4474101226d255a74a7722c10385d40bcfba8957126e175f8449abe3558173aa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_31489d432536610d93b4978e8ac67a8cef7e3ea23787888ca829cff3cd0bfb6c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_31489d432536610d93b4978e8ac67a8cef7e3ea23787888ca829cff3cd0bfb6c->enter($__internal_31489d432536610d93b4978e8ac67a8cef7e3ea23787888ca829cff3cd0bfb6c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_0ad293f48bf31d9e76c8d4d505d15734c2361d665f272fe5f57d49e78d60b79b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0ad293f48bf31d9e76c8d4d505d15734c2361d665f272fe5f57d49e78d60b79b->enter($__internal_0ad293f48bf31d9e76c8d4d505d15734c2361d665f272fe5f57d49e78d60b79b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_31489d432536610d93b4978e8ac67a8cef7e3ea23787888ca829cff3cd0bfb6c->leave($__internal_31489d432536610d93b4978e8ac67a8cef7e3ea23787888ca829cff3cd0bfb6c_prof);

        
        $__internal_0ad293f48bf31d9e76c8d4d505d15734c2361d665f272fe5f57d49e78d60b79b->leave($__internal_0ad293f48bf31d9e76c8d4d505d15734c2361d665f272fe5f57d49e78d60b79b_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_72166ee70224975e3fa0547ae3f97f8c3018bafffeccf16a099b856b962867ab = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_72166ee70224975e3fa0547ae3f97f8c3018bafffeccf16a099b856b962867ab->enter($__internal_72166ee70224975e3fa0547ae3f97f8c3018bafffeccf16a099b856b962867ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_f798b01445ad4a57be324178f407e0d46cabb0ff06a44982286dfd6df2105115 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f798b01445ad4a57be324178f407e0d46cabb0ff06a44982286dfd6df2105115->enter($__internal_f798b01445ad4a57be324178f407e0d46cabb0ff06a44982286dfd6df2105115_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_f798b01445ad4a57be324178f407e0d46cabb0ff06a44982286dfd6df2105115->leave($__internal_f798b01445ad4a57be324178f407e0d46cabb0ff06a44982286dfd6df2105115_prof);

        
        $__internal_72166ee70224975e3fa0547ae3f97f8c3018bafffeccf16a099b856b962867ab->leave($__internal_72166ee70224975e3fa0547ae3f97f8c3018bafffeccf16a099b856b962867ab_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_e46696b349f33909a00ddb4def176dd8a9ac289b87d19d4df1465143f6936d8b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e46696b349f33909a00ddb4def176dd8a9ac289b87d19d4df1465143f6936d8b->enter($__internal_e46696b349f33909a00ddb4def176dd8a9ac289b87d19d4df1465143f6936d8b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_acfbecdc7db73b24fbdd231d82fcdbd280c43adf6bacffd0c078fdf280278302 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_acfbecdc7db73b24fbdd231d82fcdbd280c43adf6bacffd0c078fdf280278302->enter($__internal_acfbecdc7db73b24fbdd231d82fcdbd280c43adf6bacffd0c078fdf280278302_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_acfbecdc7db73b24fbdd231d82fcdbd280c43adf6bacffd0c078fdf280278302->leave($__internal_acfbecdc7db73b24fbdd231d82fcdbd280c43adf6bacffd0c078fdf280278302_prof);

        
        $__internal_e46696b349f33909a00ddb4def176dd8a9ac289b87d19d4df1465143f6936d8b->leave($__internal_e46696b349f33909a00ddb4def176dd8a9ac289b87d19d4df1465143f6936d8b_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_6ff425b12ff8bea18aa70fc5ee4939ba217992c46e175bc936aab49f9fecd21a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6ff425b12ff8bea18aa70fc5ee4939ba217992c46e175bc936aab49f9fecd21a->enter($__internal_6ff425b12ff8bea18aa70fc5ee4939ba217992c46e175bc936aab49f9fecd21a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_d46bbde9cb2b3040bf0e7ce46238078922dbe88fa9efd3c685ee0b612625f096 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d46bbde9cb2b3040bf0e7ce46238078922dbe88fa9efd3c685ee0b612625f096->enter($__internal_d46bbde9cb2b3040bf0e7ce46238078922dbe88fa9efd3c685ee0b612625f096_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_d46bbde9cb2b3040bf0e7ce46238078922dbe88fa9efd3c685ee0b612625f096->leave($__internal_d46bbde9cb2b3040bf0e7ce46238078922dbe88fa9efd3c685ee0b612625f096_prof);

        
        $__internal_6ff425b12ff8bea18aa70fc5ee4939ba217992c46e175bc936aab49f9fecd21a->leave($__internal_6ff425b12ff8bea18aa70fc5ee4939ba217992c46e175bc936aab49f9fecd21a_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Users/benjamin/ISIMA/2A/CIWEB/zzAgenda/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
