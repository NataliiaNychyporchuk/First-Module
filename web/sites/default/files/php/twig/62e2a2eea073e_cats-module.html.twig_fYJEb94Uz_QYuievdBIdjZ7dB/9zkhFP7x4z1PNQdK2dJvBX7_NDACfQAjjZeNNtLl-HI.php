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
        // line 15
        echo "
";
        // line 16
        if ( !twig_test_empty(($context["cats"] ?? null))) {
            // line 17
            echo "  <ul class=\"cats-container\">
    ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cats"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 19
                echo "      <li class=\"cats-module\">
        <a href=\"";
                // line 20
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "picture_src", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                echo "\" target=\"_blank\" class=\"img-container\">
          <img src=\"";
                // line 21
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "picture_src", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                echo "\" alt=\"A Cat\">
        </a>
        <div class=\"cat-information\">
          <span class=\"created-date\">";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Cat was added"));
                echo ": ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "created", [], "any", false, false, true, 24), 24, $this->source), "j/m/Y H:i:s"), "html", null, true);
                echo "</span>
          <span>";
                // line 25
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Cat's name"));
                echo ": ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "name", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                echo "</span>
          <span>";
                // line 26
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Cat's owner email"));
                echo ": ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "email", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                echo "</span>
          ";
                // line 27
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nnychyporchuk"], "method", false, false, true, 27)) {
                    // line 28
                    echo "            <div class=\"cats-btn\" role=\"group\">
              <a class=\"btn btn-outline-danger use-ajax\"
                 data-dialog-options=\"{&quot;width&quot;:400}\"
                 data-dialog-type=\"modal\"
                 type=\"button\"
                 href=\"/nnychyporchuk/cats/";
                    // line 33
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                    echo "/delete\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Delete cat entity"));
                    echo "</a>
              <a class=\"btn btn-outline-warning use-ajax\"
                 data-dialog-options=\"{&quot;width&quot;:400}\"
                 data-dialog-type=\"modal\"
                 type=\"button\"
                 href=\"/nnychyporchuk/cats/";
                    // line 38
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                    echo "/edit\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edit cat entity"));
                    echo "</a>
            </div>
          ";
                }
                // line 41
                echo "        </div>
      </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
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
        return array (  117 => 44,  109 => 41,  101 => 38,  91 => 33,  84 => 28,  82 => 27,  76 => 26,  70 => 25,  64 => 24,  58 => 21,  54 => 20,  51 => 19,  47 => 18,  44 => 17,  42 => 16,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/subtheme/templates/cats-module.html.twig", "/var/www/example/web/themes/custom/subtheme/templates/cats-module.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16, "for" => 18);
        static $filters = array("escape" => 20, "t" => 24, "date" => 24);
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
