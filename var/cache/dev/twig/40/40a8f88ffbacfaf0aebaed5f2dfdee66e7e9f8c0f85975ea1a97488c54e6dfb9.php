<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_a611f92a27af130951d9078fddf1bbafe1cc49e2bd58b9706ba15334252c5e8a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
        $__internal_b09511076db5c671a8462ad4064aae7e4944ec922716997c56493c4db59e38e2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b09511076db5c671a8462ad4064aae7e4944ec922716997c56493c4db59e38e2->enter($__internal_b09511076db5c671a8462ad4064aae7e4944ec922716997c56493c4db59e38e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_94c6f34d0e6cbca6f9bf4ea913c9cbae8691c22abecfec5475867203c5e0f69c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_94c6f34d0e6cbca6f9bf4ea913c9cbae8691c22abecfec5475867203c5e0f69c->enter($__internal_94c6f34d0e6cbca6f9bf4ea913c9cbae8691c22abecfec5475867203c5e0f69c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b09511076db5c671a8462ad4064aae7e4944ec922716997c56493c4db59e38e2->leave($__internal_b09511076db5c671a8462ad4064aae7e4944ec922716997c56493c4db59e38e2_prof);

        
        $__internal_94c6f34d0e6cbca6f9bf4ea913c9cbae8691c22abecfec5475867203c5e0f69c->leave($__internal_94c6f34d0e6cbca6f9bf4ea913c9cbae8691c22abecfec5475867203c5e0f69c_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_a7ea0b2afd847518b7b57cdb3a9f31addcae533afc34bbc82c74e2dcbf0c14a5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a7ea0b2afd847518b7b57cdb3a9f31addcae533afc34bbc82c74e2dcbf0c14a5->enter($__internal_a7ea0b2afd847518b7b57cdb3a9f31addcae533afc34bbc82c74e2dcbf0c14a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_511f7890161407f217f0722c50b6c93e2dbacaccc1f9c217ae2eef3b8122ab78 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_511f7890161407f217f0722c50b6c93e2dbacaccc1f9c217ae2eef3b8122ab78->enter($__internal_511f7890161407f217f0722c50b6c93e2dbacaccc1f9c217ae2eef3b8122ab78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_511f7890161407f217f0722c50b6c93e2dbacaccc1f9c217ae2eef3b8122ab78->leave($__internal_511f7890161407f217f0722c50b6c93e2dbacaccc1f9c217ae2eef3b8122ab78_prof);

        
        $__internal_a7ea0b2afd847518b7b57cdb3a9f31addcae533afc34bbc82c74e2dcbf0c14a5->leave($__internal_a7ea0b2afd847518b7b57cdb3a9f31addcae533afc34bbc82c74e2dcbf0c14a5_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_c16bdeea17ffdbd157ef176b9684dbf6868986f4f3122609ae27df92ec74d2bc = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c16bdeea17ffdbd157ef176b9684dbf6868986f4f3122609ae27df92ec74d2bc->enter($__internal_c16bdeea17ffdbd157ef176b9684dbf6868986f4f3122609ae27df92ec74d2bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_3d773efc1e1c37b306ceb77ddc272f1cb7184d93ccc0ace3b1a6999def30fd25 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3d773efc1e1c37b306ceb77ddc272f1cb7184d93ccc0ace3b1a6999def30fd25->enter($__internal_3d773efc1e1c37b306ceb77ddc272f1cb7184d93ccc0ace3b1a6999def30fd25_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_3d773efc1e1c37b306ceb77ddc272f1cb7184d93ccc0ace3b1a6999def30fd25->leave($__internal_3d773efc1e1c37b306ceb77ddc272f1cb7184d93ccc0ace3b1a6999def30fd25_prof);

        
        $__internal_c16bdeea17ffdbd157ef176b9684dbf6868986f4f3122609ae27df92ec74d2bc->leave($__internal_c16bdeea17ffdbd157ef176b9684dbf6868986f4f3122609ae27df92ec74d2bc_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_87bf9f16cd67300a73a43ef3bad77a25fd77fb6db169bbba3a7cd46bddd412da = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_87bf9f16cd67300a73a43ef3bad77a25fd77fb6db169bbba3a7cd46bddd412da->enter($__internal_87bf9f16cd67300a73a43ef3bad77a25fd77fb6db169bbba3a7cd46bddd412da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_2962675df805385182073dc75d385ac05417533f2b986b16f8dd7d234515cc93 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2962675df805385182073dc75d385ac05417533f2b986b16f8dd7d234515cc93->enter($__internal_2962675df805385182073dc75d385ac05417533f2b986b16f8dd7d234515cc93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_2962675df805385182073dc75d385ac05417533f2b986b16f8dd7d234515cc93->leave($__internal_2962675df805385182073dc75d385ac05417533f2b986b16f8dd7d234515cc93_prof);

        
        $__internal_87bf9f16cd67300a73a43ef3bad77a25fd77fb6db169bbba3a7cd46bddd412da->leave($__internal_87bf9f16cd67300a73a43ef3bad77a25fd77fb6db169bbba3a7cd46bddd412da_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
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

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/Users/benjamin/ISIMA/2A/CIWEB/zzAgenda/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
