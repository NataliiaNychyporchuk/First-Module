<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/nnychyporchuk/templates/cat-buttons.html.twig */
class __TwigTemplate_07b9fc73d729f0aaec4f83351db9dda14bec489271a8eb153ac4358365eb60d5 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"cats-btn\" role=\"group\">
  <a class=\"btn btn-outline-danger use-ajax\"
     data-dialog-options=\"{&quot;width&quot;:400}\"
     data-dialog-type=\"modal\"
     type=\"button\"
     href=\"/nnychyporchuk/cats/";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 6, $this->source), "html", null, true);
        echo "/delete\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Delete cat entity"));
        echo "</a>
  <a class=\"btn btn-outline-warning use-ajax\"
     data-dialog-options=\"{&quot;width&quot;:400}\"
     data-dialog-type=\"modal\"
     type=\"button\"
     href=\"/nnychyporchuk/cats/";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 11, $this->source), "html", null, true);
        echo "/edit\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edit cat entity"));
        echo "</a>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/nnychyporchuk/templates/cat-buttons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 11,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nnychyporchuk/templates/cat-buttons.html.twig", "/var/www/example/web/modules/custom/nnychyporchuk/templates/cat-buttons.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 6, "t" => 6);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
