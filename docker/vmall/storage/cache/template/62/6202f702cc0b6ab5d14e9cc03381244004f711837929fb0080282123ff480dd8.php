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

/* sale/order_shipping.twig */
class __TwigTemplate_70ebab8bcdadf2257ca868c5d649338906767e631daf0fa535130d9ac56a5b31 extends \Twig\Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<head>
<meta charset=\"UTF-8\" />
<title>";
        // line 5
        echo ($context["title"] ?? null);
        echo "</title>
<base href=\"";
        // line 6
        echo ($context["base"] ?? null);
        echo "\" />
<link href=\"view/javascript/bootstrap/css/bootstrap.css\" rel=\"stylesheet\" media=\"all\" />
<script type=\"text/javascript\" src=\"view/javascript/jquery/jquery-2.1.1.min.js\"></script>
<script type=\"text/javascript\" src=\"view/javascript/bootstrap/js/bootstrap.min.js\"></script>
<link href=\"view/javascript/font-awesome/css/font-awesome.min.css\" type=\"text/css\" rel=\"stylesheet\" />
<link type=\"text/css\" href=\"view/stylesheet/stylesheet.css\" rel=\"stylesheet\" media=\"all\" />
</head>
<body>
<div class=\"container\">
  ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 16
            echo "  <div style=\"page-break-after: always;\">
    <h1>";
            // line 17
            echo ($context["text_picklist"] ?? null);
            echo " #";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 17);
            echo "</h1>
    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <td colspan=\"2\">";
            // line 21
            echo ($context["text_order_detail"] ?? null);
            echo "</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><address>
            <strong>";
            // line 27
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_name", [], "any", false, false, false, 27);
            echo "</strong><br/>
            ";
            // line 28
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_address", [], "any", false, false, false, 28);
            echo "
            </address>
            <b>";
            // line 30
            echo ($context["text_telephone"] ?? null);
            echo "</b> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_telephone", [], "any", false, false, false, 30);
            echo "<br/>
            <b>";
            // line 31
            echo ($context["text_email"] ?? null);
            echo "</b> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_email", [], "any", false, false, false, 31);
            echo "<br/>
            <b>";
            // line 32
            echo ($context["text_website"] ?? null);
            echo "</b> <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_url", [], "any", false, false, false, 32);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_url", [], "any", false, false, false, 32);
            echo "</a></td>
          <td style=\"width: 50%;\"><b>";
            // line 33
            echo ($context["text_date_added"] ?? null);
            echo "</b> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "date_added", [], "any", false, false, false, 33);
            echo "<br/>
            ";
            // line 34
            if (twig_get_attribute($this->env, $this->source, $context["order"], "invoice_no", [], "any", false, false, false, 34)) {
                // line 35
                echo "            <b>";
                echo ($context["text_invoice_no"] ?? null);
                echo "</b> ";
                echo twig_get_attribute($this->env, $this->source, $context["order"], "invoice_no", [], "any", false, false, false, 35);
                echo "<br/>
            ";
            }
            // line 37
            echo "            <b>";
            echo ($context["text_order_id"] ?? null);
            echo "</b> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 37);
            echo "<br/>
            ";
            // line 38
            if (twig_get_attribute($this->env, $this->source, $context["order"], "shipping_method", [], "any", false, false, false, 38)) {
                // line 39
                echo "            <b>";
                echo ($context["text_shipping_method"] ?? null);
                echo "</b> ";
                echo twig_get_attribute($this->env, $this->source, $context["order"], "shipping_method", [], "any", false, false, false, 39);
                echo "<br/>
            ";
            }
            // line 40
            echo "</td>
        </tr>
      </tbody>
    </table>
    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <td style=\"width: 50%;\"><b>";
            // line 47
            echo ($context["text_shipping_address"] ?? null);
            echo "</b></td>
          <td style=\"width: 50%;\"><b>";
            // line 48
            echo ($context["text_contact"] ?? null);
            echo "</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>";
            // line 53
            echo twig_get_attribute($this->env, $this->source, $context["order"], "shipping_address", [], "any", false, false, false, 53);
            echo "</td>
          <td>";
            // line 54
            echo twig_get_attribute($this->env, $this->source, $context["order"], "email", [], "any", false, false, false, 54);
            echo "<br/>
            ";
            // line 55
            echo twig_get_attribute($this->env, $this->source, $context["order"], "telephone", [], "any", false, false, false, 55);
            echo "</td>
        </tr>
      </tbody>
    </table>
    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <td><b>";
            // line 62
            echo ($context["column_location"] ?? null);
            echo "</b></td>
          <td><b>";
            // line 63
            echo ($context["column_reference"] ?? null);
            echo "</b></td>
          <td><b>";
            // line 64
            echo ($context["column_product"] ?? null);
            echo "</b></td>
          <td><b>";
            // line 65
            echo ($context["column_weight"] ?? null);
            echo "</b></td>
          <td><b>";
            // line 66
            echo ($context["column_model"] ?? null);
            echo "</b></td>
          <td class=\"text-right\"><b>";
            // line 67
            echo ($context["column_quantity"] ?? null);
            echo "</b></td>
        </tr>
      </thead>
      <tbody>
        ";
            // line 71
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 71));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 72
                echo "        <tr>
          <td>";
                // line 73
                echo twig_get_attribute($this->env, $this->source, $context["product"], "location", [], "any", false, false, false, 73);
                echo "</td>
          <td>";
                // line 74
                if (twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 74)) {
                    // line 75
                    echo "            ";
                    echo ($context["text_sku"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 75);
                    echo "<br/>
            ";
                }
                // line 77
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "upc", [], "any", false, false, false, 77)) {
                    // line 78
                    echo "            ";
                    echo ($context["text_upc"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "upc", [], "any", false, false, false, 78);
                    echo "<br/>
            ";
                }
                // line 80
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "ean", [], "any", false, false, false, 80)) {
                    // line 81
                    echo "            ";
                    echo ($context["text_ean"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "ean", [], "any", false, false, false, 81);
                    echo "<br/>
            ";
                }
                // line 83
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "jan", [], "any", false, false, false, 83)) {
                    // line 84
                    echo "            ";
                    echo ($context["text_jan"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "jan", [], "any", false, false, false, 84);
                    echo "<br/>
            ";
                }
                // line 86
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "isbn", [], "any", false, false, false, 86)) {
                    // line 87
                    echo "            ";
                    echo ($context["text_isbn"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "isbn", [], "any", false, false, false, 87);
                    echo "<br/>
            ";
                }
                // line 89
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "mpn", [], "any", false, false, false, 89)) {
                    // line 90
                    echo "            ";
                    echo ($context["text_mpn"] ?? null);
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "mpn", [], "any", false, false, false, 90);
                    echo "<br/>
            ";
                }
                // line 91
                echo "</td>
          <td>";
                // line 92
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 92);
                echo "
            ";
                // line 93
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 93));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 94
                    echo "            <br/>
            &nbsp;<small> - ";
                    // line 95
                    echo twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 95);
                    echo ": ";
                    echo twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 95);
                    echo "</small>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 96
                echo "</td>
          <td>";
                // line 97
                echo twig_get_attribute($this->env, $this->source, $context["product"], "weight", [], "any", false, false, false, 97);
                echo "</td>
          <td>";
                // line 98
                echo twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 98);
                echo "</td>
          <td class=\"text-right\">";
                // line 99
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 99);
                echo "</td>
        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "      </tbody>
    </table>
    ";
            // line 104
            if (twig_get_attribute($this->env, $this->source, $context["order"], "comment", [], "any", false, false, false, 104)) {
                // line 105
                echo "    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <td><b>";
                // line 108
                echo ($context["text_comment"] ?? null);
                echo "</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>";
                // line 113
                echo twig_get_attribute($this->env, $this->source, $context["order"], "comment", [], "any", false, false, false, 113);
                echo "</td>
        </tr>
      </tbody>
    </table>
    ";
            }
            // line 118
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "sale/order_shipping.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 120,  363 => 118,  355 => 113,  347 => 108,  342 => 105,  340 => 104,  336 => 102,  327 => 99,  323 => 98,  319 => 97,  316 => 96,  306 => 95,  303 => 94,  299 => 93,  295 => 92,  292 => 91,  285 => 90,  282 => 89,  274 => 87,  271 => 86,  263 => 84,  260 => 83,  252 => 81,  249 => 80,  241 => 78,  238 => 77,  230 => 75,  228 => 74,  224 => 73,  221 => 72,  217 => 71,  210 => 67,  206 => 66,  202 => 65,  198 => 64,  194 => 63,  190 => 62,  180 => 55,  176 => 54,  172 => 53,  164 => 48,  160 => 47,  151 => 40,  143 => 39,  141 => 38,  134 => 37,  126 => 35,  124 => 34,  118 => 33,  110 => 32,  104 => 31,  98 => 30,  93 => 28,  89 => 27,  80 => 21,  71 => 17,  68 => 16,  64 => 15,  52 => 6,  48 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sale/order_shipping.twig", "");
    }
}
