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

/* extension/module/lts_vendor.twig */
class __TwigTemplate_8a05050ff3b059cc739d371efdb143b4629ce7d8d8bce7e3570983f56c654f86 extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo " ";
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <div class=\"pull-right\">
                <button type=\"submit\" form=\"form-vendor\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
                <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
            <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "                    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "            </ul>
        </div>
    </div>
    <div class=\"container-fluid\">
        <div class=\"alert alert-success\"><i class=\"fa fa-info-circle\"></i> ";
        // line 17
        echo ($context["text_feedback"] ?? null);
        echo "</div>
        ";
        // line 18
        if (($context["error_warning"] ?? null)) {
            // line 19
            echo "            <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        }
        // line 22
        echo " 
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 25
        echo ($context["text_edit"] ?? null);
        echo "</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 28
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-vendor\" class=\"form-horizontal\">
                    <div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\" for=\"input-status\">";
        // line 30
        echo ($context["entry_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-9\">
                            <select name=\"module_lts_vendor_status\" id=\"input-status\" class=\"form-control\">
                                ";
        // line 33
        if (($context["module_lts_vendor_status"] ?? null)) {
            // line 34
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 35
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 37
            echo "                                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 38
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                ";
        }
        // line 40
        echo "                            </select>
                        </div>
                    </div>
                    <hr>
                    <ul class=\"nav nav-tabs\">
                        <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 45
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
                        <li><a href=\"#tab-product\" data-toggle=\"tab\">";
        // line 46
        echo ($context["tab_product"] ?? null);
        echo "</a></li>
                            
                        <li><a href=\"#tab-order\" data-toggle=\"tab\">";
        // line 48
        echo ($context["tab_order"] ?? null);
        echo "</a></li>
                        <li><a href=\"#tab-profile\" data-toggle=\"tab\">";
        // line 49
        echo ($context["tab_profile"] ?? null);
        echo "</a></li>
                        <li><a href=\"#tab-commission\" data-toggle=\"tab\">";
        // line 50
        echo ($context["tab_commission"] ?? null);
        echo "</a></li>
                    </ul>
                    <div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"tab-general\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 55
        echo ($context["entry_vendor_registration"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_registration\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 58
        if (($context["module_lts_vendor_registration"] ?? null)) {
            // line 59
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 60
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 62
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 63
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 65
        echo "                                    </select>
                                </div>
                            </div>  
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 69
        echo ($context["entry_vendor_approval"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_approval\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 72
        if (($context["module_lts_vendor_approval"] ?? null)) {
            // line 73
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 74
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 76
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 77
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 79
        echo "                                    </select>
                                </div>
                            </div>  
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 83
        echo ($context["entry_product_approval"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_product_approval\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 86
        if (($context["module_lts_vendor_product_approval"] ?? null)) {
            // line 87
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 88
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 90
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 91
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 93
        echo "                                    </select>
                                </div>
                            </div>  
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 97
        echo ($context["entry_category_approval"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_category_approval\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 100
        if (($context["module_lts_vendor_category_approval"] ?? null)) {
            // line 101
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 102
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 104
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 105
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 107
        echo "                                    </select>
                                </div>
                            </div>  
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 111
        echo ($context["entry_review_action"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_review_action\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 114
        if (($context["module_lts_vendor_review_action"] ?? null)) {
            // line 115
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 116
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 118
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 119
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 121
        echo "                                    </select>
                                </div>
                            </div>  
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 125
        echo ($context["entry_vendor_name_in_cart"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_name_in_cart\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 128
        if (($context["module_lts_vendor_name_in_cart"] ?? null)) {
            // line 129
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 130
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 132
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 133
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 135
        echo "                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=\"tab-pane\" id=\"tab-product\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-status\">";
        // line 141
        echo ($context["entry_pincode_checker"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <div class=\"well well-sm\" style=\"height: 80px; overflow: auto;\">
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 146
        if (($context["admin_pincode"] ?? null)) {
            // line 147
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_pincode_checker[admin]\" value=\"admin\" checked=\"checked\" /> ";
            echo ($context["text_admin"] ?? null);
            echo "
                                                ";
        } else {
            // line 149
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_pincode_checker[admin]\" value=\"admin\"/> ";
            echo ($context["text_admin"] ?? null);
            echo "
                                                ";
        }
        // line 151
        echo "                                            </label>
                                        </div>
                                      ";
        // line 162
        echo "
                                    </div>
                                </div>
                            </div>

                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-multi-product\">";
        // line 168
        echo ($context["entry_multi_product_action"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_multi_product\" id=\"input-multi-product\" class=\"form-control\">
                                        ";
        // line 171
        if (($context["module_lts_vendor_multi_product"] ?? null)) {
            // line 172
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 173
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 175
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 176
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 178
        echo "                                    </select>
                                </div>
                            </div>  

                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 183
        echo ($context["entry_product_category"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_category_required\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 186
        if (($context["module_lts_vendor_category_required"] ?? null)) {
            // line 187
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 188
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 190
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 191
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 193
        echo "                                    </select>
                                </div>
                            </div> 
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 197
        echo ($context["entry_admin_receive_mail_product_add"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_admin_receive_mail_product_add\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 200
        if (($context["module_lts_vendor_admin_receive_mail_product_add"] ?? null)) {
            // line 201
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 202
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 204
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 205
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 207
        echo "                                    </select>
                                </div>
                            </div> 
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 211
        echo ($context["entry_seller_delete_product"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_delete_product\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 214
        if (($context["module_lts_vendor_delete_product"] ?? null)) {
            // line 215
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 216
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 218
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 219
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 221
        echo "                                    </select>
                                </div>
                            </div> 

                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 226
        echo ($context["entry_product_tab"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <div class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 231
        if (($context["links"] ?? null)) {
            // line 232
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[links]\" value=\"";
            echo ($context["links"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_links"] ?? null);
            echo "
                                                ";
        } else {
            // line 234
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[links]\" value=\"links\"/> ";
            echo ($context["tab_links"] ?? null);
            echo "
                                                ";
        }
        // line 236
        echo "                                            </label>
                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label>
                                                ";
        // line 240
        if (($context["attribute"] ?? null)) {
            // line 241
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[attribute]\" value=\"attribute\" checked=\"checked\" /> ";
            echo ($context["tab_attribute"] ?? null);
            echo "
                                                ";
        } else {
            // line 243
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[attribute]\" value=\"attribute\" /> ";
            echo ($context["tab_attribute"] ?? null);
            echo "
                                                ";
        }
        // line 245
        echo "                                            </label>

                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 250
        if (($context["option"] ?? null)) {
            // line 251
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[option]\" value=\"";
            echo ($context["option"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_option"] ?? null);
            echo "
                                                ";
        } else {
            // line 253
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[option]\" value=\"option\"  /> ";
            echo ($context["tab_option"] ?? null);
            echo "
                                                ";
        }
        // line 255
        echo "                                            </label>
                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 259
        if (($context["discount"] ?? null)) {
            // line 260
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[";
            echo ($context["discount"] ?? null);
            echo "]\" value=\"";
            echo ($context["discount"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_discount"] ?? null);
            echo "
                                                ";
        } else {
            // line 262
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[discount]\" value=\"discount\" /> ";
            echo ($context["tab_discount"] ?? null);
            echo "
                                                ";
        }
        // line 264
        echo "                                            </label>
                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 268
        if (($context["special"] ?? null)) {
            // line 269
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[";
            echo ($context["special"] ?? null);
            echo "]\" value=\"";
            echo ($context["special"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_special"] ?? null);
            echo "
                                                ";
        } else {
            // line 271
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[special]\" value=\"special\" /> ";
            echo ($context["tab_special"] ?? null);
            echo "
                                                ";
        }
        // line 273
        echo "                                            </label>
                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 277
        if (($context["image"] ?? null)) {
            // line 278
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[";
            echo ($context["image"] ?? null);
            echo "]\" value=\"";
            echo ($context["image"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_image"] ?? null);
            echo "
                                                ";
        } else {
            // line 280
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[image]\" value=\"image\" /> ";
            echo ($context["tab_image"] ?? null);
            echo "
                                                ";
        }
        // line 282
        echo "                                            </label>
                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label> 
                                                ";
        // line 286
        if (($context["reward"] ?? null)) {
            // line 287
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[";
            echo ($context["reward"] ?? null);
            echo "]\" value=\"";
            echo ($context["reward"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_reward"] ?? null);
            echo "
                                                ";
        } else {
            // line 289
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[reward]\" value=\"reward\" /> ";
            echo ($context["tab_reward"] ?? null);
            echo "\t\t\t\t                    \t
                                                ";
        }
        // line 291
        echo "                                            </label>
                                        </div>
                                        <div class=\"checkbox\"> 
                                            <label>
                                                ";
        // line 295
        if (($context["seo"] ?? null)) {
            // line 296
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[";
            echo ($context["seo"] ?? null);
            echo "]\" value=\"";
            echo ($context["seo"] ?? null);
            echo "\" checked=\"checked\" /> ";
            echo ($context["tab_seo"] ?? null);
            echo "
                                                ";
        } else {
            // line 298
            echo "                                                    <input type=\"checkbox\" name=\"module_lts_vendor_product_tab[seo]\" value=\"seo\" /> ";
            echo ($context["tab_seo"] ?? null);
            echo "
                                                ";
        }
        // line 300
        echo "                                            </label>
                                        </div>
                                    </div>
                                    
                                    <button type=\"button\" onclick=\"\$(this).parent().find(':checkbox').prop('checked', true);\" class=\"btn btn-link\">";
        // line 304
        echo ($context["text_select_all"] ?? null);
        echo "</button> / <button type=\"button\" onclick=\"\$(this).parent().find(':checkbox').prop('checked', false);\" class=\"btn btn-link\">";
        echo ($context["text_unselect_all"] ?? null);
        echo "</button>
                              
                                </div>
                            </div> 
                        </div>
                      
                        <div class=\"tab-pane\" id=\"tab-order\">
                            
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 313
        echo ($context["entry_vendor_can_change_status"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_vendor_can_change_order_status\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 316
        if (($context["module_lts_vendor_vendor_can_change_order_status"] ?? null)) {
            // line 317
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 318
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 320
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 321
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 323
        echo "                                    </select>
                                </div>
                            </div> 

                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 328
        echo ($context["entry_order_status_change_by_vendor"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_order_status_change_by_vendor\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 331
        if (($context["module_lts_vendor_order_status_change_by_vendor"] ?? null)) {
            // line 332
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 333
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 335
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 336
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 338
        echo "                                    </select>
                                </div>
                            </div> 
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 342
        echo ($context["entry_vendor_receive_mail_product_purchase"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_receive_mail_product_purchase\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 345
        if (($context["module_lts_vendor_receive_mail_product_purchase"] ?? null)) {
            // line 346
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 347
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 349
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 350
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 352
        echo "                                    </select>
                                </div>
                            </div> 
                        </div> 
                        <div class=\"tab-pane\" id=\"tab-profile\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 358
        echo ($context["entry_customer_can_see_vendor_email"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_customer_can_see_vendor_email\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 361
        if (($context["module_lts_vendor_customer_can_see_vendor_email"] ?? null)) {
            // line 362
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 363
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 365
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 366
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 368
        echo "                                    </select>
                                </div>
                            </div> 

                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-name\">";
        // line 373
        echo ($context["entry_customer_can_see_vendor_telephone"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_customer_can_see_vendor_telephone\" id=\"input-status\" class=\"form-control\">
                                        ";
        // line 376
        if (($context["module_lts_vendor_customer_can_see_vendor_telephone"] ?? null)) {
            // line 377
            echo "                                            <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\">";
            // line 378
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        } else {
            // line 380
            echo "                                            <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                            <option value=\"0\" selected=\"selected\">";
            // line 381
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                        ";
        }
        // line 383
        echo "                                    </select>
                                </div>
                            </div> 
                        </div>
                         <div class=\"tab-pane\" id=\"tab-commission\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-receive-commission\">
                                <span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
        // line 390
        echo ($context["text_commission"] ?? null);
        echo "\">";
        echo ($context["entry_commission_on_order"] ?? null);
        echo "</span></label>
                                <div class=\"col-sm-9\">
                                    <select name=\"module_lts_vendor_received_commission_status_id\" id=\"input-receive-commission\" class=\"form-control\">
                                        ";
        // line 393
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 394
            echo "                                            ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 394) == ($context["module_lts_vendor_received_commission_status_id"] ?? null))) {
                // line 395
                echo "                                            
                                            <option value=\"";
                // line 396
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 396);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 396);
                echo "</option>
                                            
                                            ";
            } else {
                // line 399
                echo "                                            
                                            <option value=\"";
                // line 400
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 400);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 400);
                echo "</option>
                                            
                                            ";
            }
            // line 403
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 404
        echo "                                    </select>
                                </div>
                            </div>   

                            <div class=\"form-group\">
                                <label class=\"col-sm-3 control-label\" for=\"input-default-commission\">";
        // line 409
        echo ($context["entry_default_commission"] ?? null);
        echo "</label>
                                <div class=\"col-sm-9\">
                                 <div class=\"input-group\">
                                    
                                    <input id=\"input-default-commission\" type=\"text\" class=\"form-control\" name=\"module_lts_vendor_default_commission\" value=\"";
        // line 413
        echo ($context["module_lts_vendor_default_commission"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_default_commission"] ?? null);
        echo "\">
                                    <span class=\"input-group-addon\"><i class=\"fa fa-percent\"></i></span>
                                    
                                  </div>
                                </div>
                            </div> 
                         
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
";
        // line 427
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/module/lts_vendor.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1011 => 427,  992 => 413,  985 => 409,  978 => 404,  972 => 403,  964 => 400,  961 => 399,  953 => 396,  950 => 395,  947 => 394,  943 => 393,  935 => 390,  926 => 383,  921 => 381,  916 => 380,  911 => 378,  906 => 377,  904 => 376,  898 => 373,  891 => 368,  886 => 366,  881 => 365,  876 => 363,  871 => 362,  869 => 361,  863 => 358,  855 => 352,  850 => 350,  845 => 349,  840 => 347,  835 => 346,  833 => 345,  827 => 342,  821 => 338,  816 => 336,  811 => 335,  806 => 333,  801 => 332,  799 => 331,  793 => 328,  786 => 323,  781 => 321,  776 => 320,  771 => 318,  766 => 317,  764 => 316,  758 => 313,  744 => 304,  738 => 300,  732 => 298,  722 => 296,  720 => 295,  714 => 291,  708 => 289,  698 => 287,  696 => 286,  690 => 282,  684 => 280,  674 => 278,  672 => 277,  666 => 273,  660 => 271,  650 => 269,  648 => 268,  642 => 264,  636 => 262,  626 => 260,  624 => 259,  618 => 255,  612 => 253,  604 => 251,  602 => 250,  595 => 245,  589 => 243,  583 => 241,  581 => 240,  575 => 236,  569 => 234,  561 => 232,  559 => 231,  551 => 226,  544 => 221,  539 => 219,  534 => 218,  529 => 216,  524 => 215,  522 => 214,  516 => 211,  510 => 207,  505 => 205,  500 => 204,  495 => 202,  490 => 201,  488 => 200,  482 => 197,  476 => 193,  471 => 191,  466 => 190,  461 => 188,  456 => 187,  454 => 186,  448 => 183,  441 => 178,  436 => 176,  431 => 175,  426 => 173,  421 => 172,  419 => 171,  413 => 168,  405 => 162,  401 => 151,  395 => 149,  389 => 147,  387 => 146,  379 => 141,  371 => 135,  366 => 133,  361 => 132,  356 => 130,  351 => 129,  349 => 128,  343 => 125,  337 => 121,  332 => 119,  327 => 118,  322 => 116,  317 => 115,  315 => 114,  309 => 111,  303 => 107,  298 => 105,  293 => 104,  288 => 102,  283 => 101,  281 => 100,  275 => 97,  269 => 93,  264 => 91,  259 => 90,  254 => 88,  249 => 87,  247 => 86,  241 => 83,  235 => 79,  230 => 77,  225 => 76,  220 => 74,  215 => 73,  213 => 72,  207 => 69,  201 => 65,  196 => 63,  191 => 62,  186 => 60,  181 => 59,  179 => 58,  173 => 55,  165 => 50,  161 => 49,  157 => 48,  152 => 46,  148 => 45,  141 => 40,  136 => 38,  131 => 37,  126 => 35,  121 => 34,  119 => 33,  113 => 30,  108 => 28,  102 => 25,  97 => 22,  89 => 19,  87 => 18,  83 => 17,  77 => 13,  66 => 11,  62 => 10,  57 => 8,  51 => 7,  47 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/lts_vendor.twig", "");
    }
}
