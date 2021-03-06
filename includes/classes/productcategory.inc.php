<?php

/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 24.08.2016
 * Time: 16:33
 */
class ProductCategory
{
    private $id = null;
    private $name;
    private $description;

    /**
     * ProductCategory constructor.
     * @param $name
     * @param $description
     */

    public function __construct()
    {
    }


    public function __construct1($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if($this->id == null)
            $this->id = $id;
    }

    /**from VAT
     * public function setId($id)
     *{
     *   if($this->id == null && $id !== null)
     *      $this->id = $id;
     *}
     */
    
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public static function formMapper($post)
    {
        $productCategory = new ProductCategory();
            $productCategory->setId($post['productcategoryid']);
            $productCategory->setName($post['name']);
            $productCategory->setDescription($post['description']);

        return $productCategory;
    }

    public static function getForm(ProductCategory $productCategory = null)
    {
        $productCategoryId = '';
        $name = '';
        $description = '';

        if($productCategory == null) {
            $hidden = "new";
        }
        else {
            $hidden = "update";
            $productCategoryId = $productCategory->getId();
            $name = $productCategory->getName();
            $description = $productCategory->getDescription();
        }

        
        return "
            <div class=\"form-style-1\">
            <form action=\"?id=2\" method=\"POST\">
            <input type=\"hidden\" name=\"action\" value=\"$hidden\" />
            <input type=\"hidden\" name=\"productcategoryid\" value=\"$productCategoryId\">
            
            <label for=\"name\"><span>Name<span class=\"required\">*</span></span> 
              <input type=\"text\" class=\"input-field\" name=\"name\" value=\"$name\" maxlength=\"100\" placeholder=\"Name\" required/>
            </label>
           <label for=\"name\"><span>Beschreibung<span class=\"required\">*</span></span> 
              <textarea name=\"description\" class=\"textarea-field\" placeholder=\"Beschreibung\" required>$description</textarea>
              </label>	
          
            <label><span>&nbsp;</span><input class='btn' type=\"submit\" value=\"speichern\" /></label>
            
            </form>
            </div>";
    }

    public static function getTable($productcategories)
    {
        $content = "
                 <table>
                  <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Beschreibung</th>
                   </tr>
                ";

        foreach ($productcategories as $productCategory)
        {
            $content .= "
                        <tr>
                         <td>" . $productCategory->getId() . "</td>
                         <td>" . $productCategory->getName() . "</td>
                         <td>" . $productCategory->getDescription() . "</td>
                         <td>
                          <button class='btn update' onclick=\"window.location.href='?id=1&productcategoryid=" . $productCategory->getId() . "'\">&auml;ndern</button>
                          <button class='btn delete' onclick=\"window.location.href='?id=4&productcategoryid=" . $productCategory->getId() . "'\">l&ouml;schen</button>
                         </td>
                        </tr>
        ";
        }

        $content .= "</table>
                       <button class='btn' onclick=\"window.location.href='?id=3'\">Neue Produktkategorie</button>
                ";

        return $content;
    }


    public function listObject()
    {
        $return = '
        <h6>' . $this->getName() . '</h6>
        <p>Beschreibung: ' . $this->getDescription().'
        <a href="">bearbeiten</a> | <a href="">l&ouml;schen</a>
        </p>        
        ';

        return $return;
    }

    public static function getDropdown($productCategories)
    {
        $content = "
        <select class='dropdown'  name=\"Produktkategorie\">
        <option selected value=\"null\">&nbsp;</option> ";

        foreach ($productCategories as $PC)
        {
            $content .= "<option value=\"" . $PC->getId() . "\">" . $PC->getName() . "</option>\n";
        }

        $content .= "</select>";

        return $content;
    }

}