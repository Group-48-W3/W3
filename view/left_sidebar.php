 <!-- Navigation-->
 <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="#" class="nav-link">
          <span class="link-text logo-text">W3</span>
          <svg 
            aria-hidden="true" 
            focusable="false"
            data-prefix="fas" 
            data-icon="angle-double-right" 
            class="svg-inline--fa fa-angle-double-right fa-w-14" 
            role="img" xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 448 512">
              <path 
                fill="currentColor" 
                d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z">
              </path>
            </svg>
        </a>
      </li>

<!--===================================================================================-->
		<?php 
		//only visible to admin
		if($_SESSION['user_role_id'] == 1){?>

		<?php }?>
<!--===================================================================================-->

<!--===================================================================================-->
		<?php 
		//only visible to admin and owner
		if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 2 ){?>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg 
            aria-hidden="true" 
            focusable="false" 
            data-prefix="fas" 
            data-icon="home" 
            class="svg-inline--fa fa-home fa-w-18" 
            role="img" xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 576 512"
          >
            <path 
              fill="currentColor" 
              d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
            </path>
          </svg>
          <span class="link-text">Home</span>
        </a>
      </li>
      <li class="nav-item">
        <div class="nav-link" onclick="expandContractMenu()">
            <svg 
              aria-hidden="true" 
              focusable="false" 
              data-prefix="fas" 
              data-icon="file-signature" 
              class="svg-inline--fa fa-file-signature fa-w-18" 
              role="img" xmlns="http://www.w3.org/2000/svg" 
              viewBox="0 0 576 512"
            >
              <path 
                fill="currentColor" 
                d="M218.17 424.14c-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34c-6.37 12.78-25.03 11.37-29.48-2.09L144 386.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.75-16.19 54.06-9.7 66 14.16 1.89 3.78 5.49 5.95 9.36 6.26v-82.12l128-127.09V160H248c-13.2 0-24-10.8-24-24V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24v-40l-128-.11c-16.12-.31-30.58-9.28-37.83-23.75zM384 121.9c0-6.3-2.5-12.4-7-16.9L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1zm-96 225.06V416h68.99l161.68-162.78-67.88-67.88L288 346.96zm280.54-179.63l-31.87-31.87c-9.94-9.94-26.07-9.94-36.01 0l-27.25 27.25 67.88 67.88 27.25-27.25c9.95-9.94 9.95-26.07 0-36.01z">
              </path>
            </svg>           
            <span class="link-text">Contracts</span>
            <span class="link-drop" id="contract-drop">▼</span>
        </div>
        <ul class="navbar-sub-nav" id="contracts-menu">
          <li class="nav-sub-item">
            <a href="" class="nav-link">
              <span class="link-text">Add New Contract</span>
            </a>
          </li>
          <li class="nav-sub-item">
            <a href="" class="nav-link">
              <span class="link-text">Create Qoutation</span>
            </a>
          </li>
          <li class="nav-sub-item">
            <a href="" class="nav-link">
              <span class="link-text">Create Invoice</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <div class="nav-link" onclick="expandReportMenu()">
            <svg 
              aria-hidden="true" 
              focusable="false" 
              data-prefix="fas" 
              data-icon="chart-line" 
              class="svg-inline--fa fa-chart-line fa-w-16" 
              role="img" xmlns="http://www.w3.org/2000/svg" 
              viewBox="0 0 512 512"
            >
              <path 
                fill="currentColor" 
                d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z">
              </path>
            </svg>
            <span class="link-text report-menu">Reports</span>
            <span class="link-drop" id="report-drop">▼</span>
        </div>
        <ul class="navbar-sub-nav" id="reports-menu">
          <li class="nav-sub-item">
            <a href="" class="nav-link">
              <span class="link-text">Master Report</span>
            </a>
          </li>
          <li class="nav-sub-item">
            <a href="" class="nav-link">
              <span class="link-text">Expense Report</span>
            </a>
          </li>
          <li class="nav-sub-item">
            <a href="" class="nav-link">
              <span class="link-text">Inventory Reporte</span>
            </a>
          </li>
        </ul>
      </li>
		<?php } ?>
<!--===================================================================================-->

<!--===================================================================================-->
		<?php 
		//only visible to admin/accountant
		if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 3){?>
		
    <?php } ?>
<!--===================================================================================-->

<!--===================================================================================-->
    <?php
    //only visible to admin/stock keeper
    if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4){?>
	
		<?php } ?>
<!--===================================================================================-->

  </ul>
</nav>

<main>