<?php
// include model
require_once("./../../model/categoryModel.php");


if(isset($_POST['catDetails']))
{
    $cat = new Category();
    $cat->addCategory();
}

if(isset($_POST['catUpdateDetails']))
{
    $cat = new Category();
    $cat->UpdateCategory();
}

if (isset($_GET['deleteid']))
{
    $cat = new Category();
    $cat->deleteCategory($_GET['deleteid']);
}

// category class
class Category
{
    function addCategory()
    {
        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];
        $cat_type = $_POST['cat_type'];

        if(!empty($cat_name) && !empty($cat_desc))
        {
        // check for validation
            addCategoryDB($cat_name, $cat_desc, $cat_type);
            header('location:./../../view/expense/expenseCategory.php');//redirection
            exit;//break;
        }
        else
        {
           echo 'Fill all required feilds';
        }
    }
    function viewCategory()
    {
        // view Categories
        $res =  viewCategoryDB();
        
        return $res;   
    }
    function deleteCategory($cat_id)
    {
        //delete Category
        if(deleterCategoryById($cat_id))
        {
            header('location:./../../view/expense/expenseCategory.php');
            exit;
        }
    }
    function updateCategory(){
        //update Category
        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];
        $cat_type = $_POST['cat_type'];
       
        if(!empty($cat_name) && !empty($cat_desc))
        {
            $result = getCatId($cat_id);
            $row = mysqli_fetch_array($result);
            $id = $row['cat_id'];   
            updateCategoryDB($cat_id, $cat_name, $cat_desc, $cat_type); 
        }
        else
        {
            echo 'Fill all required feilds';
        }
        echo "<script>alert('Category updated successfully');</script>";
        header('location:./../../view/expense/expenseCategory.php');
        
        exit;

    }
}

?>