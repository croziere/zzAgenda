<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_14ab2d7c696c7d32414ade94c06ef05d852ea5ec6e8abab7c33d8ddb1d0e29cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/ajax.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7d59448f919c9d69b4fcc57b8de00f2e9e2478b310d6879d2d60d8dfa460d88b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7d59448f919c9d69b4fcc57b8de00f2e9e2478b310d6879d2d60d8dfa460d88b->enter($__internal_7d59448f919c9d69b4fcc57b8de00f2e9e2478b310d6879d2d60d8dfa460d88b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_f2c2eb8e5332fd0bc2626310f0baafc78477c3d536ecfba56ae7176f36bd947b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f2c2eb8e5332fd0bc2626310f0baafc78477c3d536ecfba56ae7176f36bd947b->enter($__internal_f2c2eb8e5332fd0bc2626310f0baafc78477c3d536ecfba56ae7176f36bd947b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7d59448f919c9d69b4fcc57b8de00f2e9e2478b310d6879d2d60d8dfa460d88b->leave($__internal_7d59448f919c9d69b4fcc57b8de00f2e9e2478b310d6879d2d60d8dfa460d88b_prof);

        
        $__internal_f2c2eb8e5332fd0bc2626310f0baafc78477c3d536ecfba56ae7176f36bd947b->leave($__internal_f2c2eb8e5332fd0bc2626310f0baafc78477c3d536ecfba56ae7176f36bd947b_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_6bd0e1a32896fe6745c3823fa492dd46cd84774fa0b4a5843f87d5ff6aacb52a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6bd0e1a32896fe6745c3823fa492dd46cd84774fa0b4a5843f87d5ff6aacb52a->enter($__internal_6bd0e1a32896fe6745c3823fa492dd46cd84774fa0b4a5843f87d5ff6aacb52a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_f033d2bebcf983b38b345197c19c1d0385b91f6035293f6586ff9ddaaf5f2e53 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f033d2bebcf983b38b345197c19c1d0385b91f6035293f6586ff9ddaaf5f2e53->enter($__internal_f033d2bebcf983b38b345197c19c1d0385b91f6035293f6586ff9ddaaf5f2e53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        echo twig_include($this->env, $context, "@WebProfiler/Icon/ajax.svg");
        echo "
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "
    ";
        // line 9
        $context["text"] = ('' === $tmp = "        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => false));
        echo "
";
        
        $__internal_f033d2bebcf983b38b345197c19c1d0385b91f6035293f6586ff9ddaaf5f2e53->leave($__internal_f033d2bebcf983b38b345197c19c1d0385b91f6035293f6586ff9ddaaf5f2e53_prof);

        
        $__internal_6bd0e1a32896fe6745c3823fa492dd46cd84774fa0b4a5843f87d5ff6aacb52a->leave($__internal_6bd0e1a32896fe6745c3823fa492dd46cd84774fa0b4a5843f87d5ff6aacb52a_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 30,  82 => 29,  62 => 9,  59 => 8,  52 => 5,  49 => 4,  40 => 3,  11 => 1,);
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

{% block toolbar %}
    {% set icon %}
        {{ include('@WebProfiler/Icon/ajax.svg') }}
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: false }) }}
{% endblock %}
", "@WebProfiler/Collector/ajax.html.twig", "/Users/benjamin/ISIMA/2A/CIWEB/zzAgenda/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/ajax.html.twig");
    }
}
