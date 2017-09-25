<?php

/* base.html.twig */
class __TwigTemplate_0f7392102991309cf27a0a919ffad8cb4a1ac73166363ccbc7b612edd07f4f0c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ca3c87c21844db7ec8baa461df3a2681c1c28c12a30b042c9d9befac0bd99452 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ca3c87c21844db7ec8baa461df3a2681c1c28c12a30b042c9d9befac0bd99452->enter($__internal_ca3c87c21844db7ec8baa461df3a2681c1c28c12a30b042c9d9befac0bd99452_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_cfe66e446b4e751ae535b5ab6b1acc258f5396e86b11daa51abf5b58e13e153c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cfe66e446b4e751ae535b5ab6b1acc258f5396e86b11daa51abf5b58e13e153c->enter($__internal_cfe66e446b4e751ae535b5ab6b1acc258f5396e86b11daa51abf5b58e13e153c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_ca3c87c21844db7ec8baa461df3a2681c1c28c12a30b042c9d9befac0bd99452->leave($__internal_ca3c87c21844db7ec8baa461df3a2681c1c28c12a30b042c9d9befac0bd99452_prof);

        
        $__internal_cfe66e446b4e751ae535b5ab6b1acc258f5396e86b11daa51abf5b58e13e153c->leave($__internal_cfe66e446b4e751ae535b5ab6b1acc258f5396e86b11daa51abf5b58e13e153c_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_cb0d0a70a6534ce5b972e63d019a36ca78bd1e12fee753bcd218af5614b25f7d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cb0d0a70a6534ce5b972e63d019a36ca78bd1e12fee753bcd218af5614b25f7d->enter($__internal_cb0d0a70a6534ce5b972e63d019a36ca78bd1e12fee753bcd218af5614b25f7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_2c1b52544d6232a45a27b491209d88cc8b80525e2b95040ace72423626a799ce = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2c1b52544d6232a45a27b491209d88cc8b80525e2b95040ace72423626a799ce->enter($__internal_2c1b52544d6232a45a27b491209d88cc8b80525e2b95040ace72423626a799ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_2c1b52544d6232a45a27b491209d88cc8b80525e2b95040ace72423626a799ce->leave($__internal_2c1b52544d6232a45a27b491209d88cc8b80525e2b95040ace72423626a799ce_prof);

        
        $__internal_cb0d0a70a6534ce5b972e63d019a36ca78bd1e12fee753bcd218af5614b25f7d->leave($__internal_cb0d0a70a6534ce5b972e63d019a36ca78bd1e12fee753bcd218af5614b25f7d_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_e424e6ee887d38444b3b0d81a623bddce7329b34bfc5187add274c3366ccd1e2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e424e6ee887d38444b3b0d81a623bddce7329b34bfc5187add274c3366ccd1e2->enter($__internal_e424e6ee887d38444b3b0d81a623bddce7329b34bfc5187add274c3366ccd1e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_1e3444b13a110fc85e234e414872efde1902c2c129a3042652756e8c087b3791 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1e3444b13a110fc85e234e414872efde1902c2c129a3042652756e8c087b3791->enter($__internal_1e3444b13a110fc85e234e414872efde1902c2c129a3042652756e8c087b3791_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_1e3444b13a110fc85e234e414872efde1902c2c129a3042652756e8c087b3791->leave($__internal_1e3444b13a110fc85e234e414872efde1902c2c129a3042652756e8c087b3791_prof);

        
        $__internal_e424e6ee887d38444b3b0d81a623bddce7329b34bfc5187add274c3366ccd1e2->leave($__internal_e424e6ee887d38444b3b0d81a623bddce7329b34bfc5187add274c3366ccd1e2_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_8552c8530c86c1b67b3678cc52f2439523fab813bfd74822d68a823be854c165 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8552c8530c86c1b67b3678cc52f2439523fab813bfd74822d68a823be854c165->enter($__internal_8552c8530c86c1b67b3678cc52f2439523fab813bfd74822d68a823be854c165_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_470c5613947e29386ef77315a5b5a9f3b8de2d5e0fbb7353c7f9d0baf4b90270 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_470c5613947e29386ef77315a5b5a9f3b8de2d5e0fbb7353c7f9d0baf4b90270->enter($__internal_470c5613947e29386ef77315a5b5a9f3b8de2d5e0fbb7353c7f9d0baf4b90270_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_470c5613947e29386ef77315a5b5a9f3b8de2d5e0fbb7353c7f9d0baf4b90270->leave($__internal_470c5613947e29386ef77315a5b5a9f3b8de2d5e0fbb7353c7f9d0baf4b90270_prof);

        
        $__internal_8552c8530c86c1b67b3678cc52f2439523fab813bfd74822d68a823be854c165->leave($__internal_8552c8530c86c1b67b3678cc52f2439523fab813bfd74822d68a823be854c165_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_2f543447002a3d99faac8569e3e9a21e136800b40ed3edc0383ee9596ae65789 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2f543447002a3d99faac8569e3e9a21e136800b40ed3edc0383ee9596ae65789->enter($__internal_2f543447002a3d99faac8569e3e9a21e136800b40ed3edc0383ee9596ae65789_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_7ae57d1d58a697271e7344d0064e254f138894f14cd13de0b267f3d11a85aef6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7ae57d1d58a697271e7344d0064e254f138894f14cd13de0b267f3d11a85aef6->enter($__internal_7ae57d1d58a697271e7344d0064e254f138894f14cd13de0b267f3d11a85aef6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_7ae57d1d58a697271e7344d0064e254f138894f14cd13de0b267f3d11a85aef6->leave($__internal_7ae57d1d58a697271e7344d0064e254f138894f14cd13de0b267f3d11a85aef6_prof);

        
        $__internal_2f543447002a3d99faac8569e3e9a21e136800b40ed3edc0383ee9596ae65789->leave($__internal_2f543447002a3d99faac8569e3e9a21e136800b40ed3edc0383ee9596ae65789_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 11,  100 => 10,  83 => 6,  65 => 5,  53 => 12,  50 => 11,  48 => 10,  41 => 7,  39 => 6,  35 => 5,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/Users/benjamin/ISIMA/2A/CIWEB/zzAgenda/app/Resources/views/base.html.twig");
    }
}
