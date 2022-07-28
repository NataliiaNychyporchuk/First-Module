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

/* themes/custom/subtheme/templates/cats-module.html.twig */
class __TwigTemplate_aa70efe80a340cf8c83be6bea19ede44fa35ed065c30bd3a057e6be83feb2260 extends \Twig\Template
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
        // line 4
        echo "
";
        // line 5
        if ( !twig_test_empty(($context["cats"] ?? null))) {
            // line 6
            echo "  <ul class=\"cats-container\">
    ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cats"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 8
                echo "      <li class=\"cats-module\">
        <a href=\"";
                // line 9
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "picture_src", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
                echo "\" target=\"_blank\" class=\"img-container\">
          <img src=\"";
                // line 10
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "picture_src", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
                echo "\" alt=\"A Cat\">
        </a>
        <div class=\"cat-information\">
          <span class=\"created-date\">";
                // line 13
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Cat was added"));
                echo ": ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "created", [], "any", false, false, true, 13), 13, $this->source), "j/m/Y H:i:s"), "html", null, true);
                echo "</span>
          <span>";
                // line 14
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Cat's name"));
                echo ": ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "name", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                echo "</span>
          <span>";
                // line 15
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Cat's owner email"));
                echo ": ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "email", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
                echo "</span>
          ";
                // line 16
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nnychyporchuk"], "method", false, false, true, 16)) {
                    // line 17
                    echo "            <div class=\"cats-btn\" role=\"group\">
              <a class=\"btn btn-outline-danger use-ajax\"
                 data-dialog-options=\"{&quot;width&quot;:400}\"
                 data-dialog-type=\"modal\"
                 type=\"button\"
                 href=\"/nnychyporchuk/cats/";
                    // line 22
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                    echo "/delete\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Delete cat entity"));
                    echo "</a>
              <a class=\"btn btn-outline-warning use-ajax\"
                 data-dialog-options=\"{&quot;width&quot;:400}\"
                 data-dialog-type=\"modal\"
                 type=\"button\"
                 href=\"/nnychyporchuk/cats/";
                    // line 27
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                    echo "/edit\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edit cat entity"));
                    echo "</a>
            </div>
          ";
                }
                // line 30
                echo "        </div>
      </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "  </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/subtheme/templates/cats-module.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  109 => 30,  101 => 27,  91 => 22,  84 => 17,  82 => 16,  76 => 15,  70 => 14,  64 => 13,  58 => 10,  54 => 9,  51 => 8,  47 => 7,  44 => 6,  42 => 5,  39 => 4,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/subtheme/templates/cats-module.html.twig", "/var/www/example/web/themes/custom/subtheme/templates/cats-module.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 5, "for" => 7);
        static $filters = array("escape" => 9, "t" => 13, "date" => 13);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 't', 'date'],
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
