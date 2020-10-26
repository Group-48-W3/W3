<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>
<h2>Check Quantity</h2>
<div>
<div class="row">
    <div class="col-12">
      <form action="#">
        <div class="search">
          <div class="search-text">
            <div class="form-group field">
                <input class="form-field" id="search">
                <label for="search" class="form-label">Search Item</label>
              </div>
          </div>
          <div class="search-button">
              <svg 
                aria-hidden="true" 
                focusable="false" 
                data-prefix="fas" 
                data-icon="search" 
                class="svg-inline--fa fa-search fa-w-16" 
                role="img" 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 512 512">
                <path 
                  fill="currentColor" 
                  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                </path>
              </svg>
          </div>
          <div class="search-result">
            <table>
              <thead>
                <tr>
                  <th width="40%">Item</th>
                  <th width="45%">Description</th>
                  <th width="15%">Quantity</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Item"><i>Search result</i></td>
                  <td data-label="Description"><i>Description of item</i></td>
                  <td data-label="Quantity"><i>Quantity</i></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    <?php
    require_once('leftSidebar.php'); 
    require_once('footer.php'); ?>	