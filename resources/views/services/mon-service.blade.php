
<x-home>

</x-home>

@section('title', "Mon service")

<div class="container mx-auto mt-14">
    <div class="mt-4 p-4"></div>
    
 <!-- drawer component -->
 <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
     <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase">Menu</h5>
     <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
         <span class="sr-only">Close menu</span>
     </button>
   <div class="py-4 overflow-y-auto">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                   <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                   <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                   <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                   <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                   <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                   <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                   <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
             </a>
          </li>
       </ul>
    </div>
 </div>
 

    <div class="row mx-auto">
        <div class="col-md-3 overflow-auto h-full">
            <div class="px-3 py-3 flex mt-2 border bg-white">
                <div class="text-center">
                    <button class="text-white" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="#3b82f6">
                            <path d="M353.27-160q-30.27 0-51.77-21.56-21.5-21.56-21.5-51.83 0-30.28 21.56-51.78t51.83-21.5q30.28 0 51.78 21.56t21.5 51.84q0 30.27-21.56 51.77-21.56 21.5-51.84 21.5Zm253.34 0q-30.28 0-51.78-21.56t-21.5-51.83q0-30.28 21.56-51.78t51.84-21.5q30.27 0 51.77 21.56 21.5 21.56 21.5 51.84 0 30.27-21.56 51.77-21.56 21.5-51.83 21.5ZM353.27-406.67q-30.27 0-51.77-21.56-21.5-21.55-21.5-51.83 0-30.27 21.56-51.77 21.56-21.5 51.83-21.5 30.28 0 51.78 21.56 21.5 21.55 21.5 51.83 0 30.27-21.56 51.77-21.56 21.5-51.84 21.5Zm253.34 0q-30.28 0-51.78-21.56-21.5-21.55-21.5-51.83 0-30.27 21.56-51.77 21.56-21.5 51.84-21.5 30.27 0 51.77 21.56 21.5 21.55 21.5 51.83 0 30.27-21.56 51.77-21.56 21.5-51.83 21.5ZM353.27-653.33q-30.27 0-51.77-21.56-21.5-21.56-21.5-51.84 0-30.27 21.56-51.77 21.56-21.5 51.83-21.5 30.28 0 51.78 21.56t21.5 51.83q0 30.28-21.56 51.78t-51.84 21.5Zm253.34 0q-30.28 0-51.78-21.56t-21.5-51.84q0-30.27 21.56-51.77 21.56-21.5 51.84-21.5 30.27 0 51.77 21.56 21.5 21.56 21.5 51.83 0 30.28-21.56 51.78t-51.83 21.5Z"/>
                        </svg>           
                    </button>
                </div>
                <h3 class="text-gray-900 items-center flex justify-center text-lg ">Gestionnaire</h3>
            </div>
            <div class=" h-full bg-white shadow-sm border ">
                <div class=" justify-start flex-col w-full text-sm font-medium " id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="flex items-center rtl:space-x-reverse" role="presentation">
                        
                        <button class="relative inline-flex items-center w-full px-4 py-3 text-lg font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-2 focus:ring-blue-600 focus:text-blue-600" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 me-2.5 text-gray-500" height="6px" viewBox="0 -960 960 960" width="6px" fill="#3b82f6">
                                <path d="M120-120v-77.33L186.67-264v144H120Zm163.33 0v-237.33L350-424v304h-66.67Zm163.34 0v-304l66.66 67.67V-120h-66.66ZM610-120v-236.33L676.67-423v303H610Zm163.33 0v-397.33L840-584v464h-66.67ZM120-346.33v-94.34l280-278.66 160 160L840-840v94.33L560-465 400-625 120-346.33Z"/>
                            </svg>
                            Statistiques
                        </button>
                    </li>
                    <li class="flex items-center rtl:space-x-reverse" role="presentation">
        
                        <button class="relative inline-flex items-center w-full px-4 py-3 text-lg font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700" id="properties-tab" data-tabs-target="#properties" type="button" role="tab" aria-controls="properties" aria-selected="false">
                           
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 me-2.5 text-gray-500" height="4px" viewBox="0 -960 960 960" width="4px" fill="#3b82f6">
                                <path d="M80-120v-720h393.33v163.33H880v333.34h-66.67V-610h-340v96.67h80v66.66h-80V-350h80v66.67h-80v96.66h183.34V-120H80Zm66.67-66.67h96.66v-96.66h-96.66v96.66Zm0-163.33h96.66v-96.67h-96.66V-350Zm0-163.33h96.66V-610h-96.66v96.67Zm0-163.34h96.66v-96.66h-96.66v96.66Zm163.33 490h96.67v-96.66H310v96.66ZM310-350h96.67v-96.67H310V-350Zm0-163.33h96.67V-610H310v96.67Zm0-163.34h96.67v-96.66H310v96.66ZM808.67-40v-84.67h-85.34v-66.66h85.34v-85.34h66.66v85.34H960v66.66h-84.67V-40h-66.66ZM650-446.67v-66.66h66.67v66.66H650Zm0 163.34V-350h66.67v66.67H650Z"/>
                            </svg>
                            Logements
                        </button>
                    </li>
                    <li class="flex items-center rtl:space-x-reverse" role="presentation">
                        
                        <button class="relative inline-flex items-center w-full px-4 py-3 text-lg font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700" id="lands-tab" data-tabs-target="#lands" type="button" role="tab" aria-controls="lands" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 me-2.5 text-gray-500" height="4px" viewBox="0 -960 960 960" width="4px" fill="#3b82f6">
                                <path d="m46-160 142.67-284.67q8.58-16.66 24.45-26.66 15.88-10 34.83-10 19.77 0 36.24 10.83 16.48 10.83 24.81 29.83L342.67-360q4.66 10.67 17.2 9.79 12.55-.88 16.13-11.46L464-656q14-46 52.5-74.33 38.5-28.34 86.82-28.34 47.35 0 85.18 27.5 37.83 27.5 52.83 72.84L915-160h-71L678-637.33q-8.67-25-29-39.84Q628.67-692 603-692t-46.17 15q-20.5 15-28.5 40l-88 294.33Q432-316 409.5-299.33q-22.5 16.66-50.75 16.66-25.42 0-46.75-13.83t-30.67-37.83l-35-83.34L119.67-160H46Zm189-409.33q-47.67 0-81.33-33.84Q120-637 120-684.67 120-732 153.64-766t81.69-34q47.34 0 81.34 34t34 81.33q0 47.67-34 81.5-34 33.84-81.67 33.84Zm.33-66.67q20.34 0 34.5-13.92Q284-663.84 284-684.42t-14.17-34.75q-14.16-14.16-34.5-14.16-20.33 0-34.5 14.05-14.16 14.06-14.16 34.84 0 20.77 14.16 34.61Q215-636 235.33-636ZM359-282.67Zm-123.67-402Z"/>
                            </svg>
                            Terrains
                        </button>
                    </li>
                    <li class="flex items-center rtl:space-x-reverse" role="presentation">
                       
                        <button class="relative inline-flex items-center w-full px-4 py-3 text-lg font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700" id="statProfil-tab" data-tabs-target="#statProfil" type="button" role="tab" aria-controls="statProfil" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 me-2.5 text-gray-500" height="4px" viewBox="0 -960 960 960" width="4px" fill="#3b82f6">
                                <path d="M480-312q70 0 119-49t49-119q0-70-49-119t-119-49q-70 0-119 49t-49 119q0 70 49 119t119 49Zm0-72q-40 0-68-28t-28-68q0-40 28-68t68-28q40 0 68 28t28 68q0 40-28 68t-68 28Zm0 192q-142.6 0-259.8-78.5Q103-349 48-480q55-131 172.2-209.5Q337.4-768 480-768q142.6 0 259.8 78.5Q857-611 912-480q-55 131-172.2 209.5Q622.6-192 480-192Zm0-288Zm0 216q112 0 207-58t146-158q-51-100-146-158t-207-58q-112 0-207 58T127-480q51 100 146 158t207 58Z"/>
                            </svg>
                                Interaction
                        </button>
                    </li>
                    <li class="flex items-center rtl:space-x-reverse" role="presentation">
                        <button class="relative inline-flex items-center w-full px-4 py-3 text-lg font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700" id="boostor-tab" data-tabs-target="#boostor" type="button" role="tab" aria-controls="boostor" aria-selected="false">
                            <svg class="w-6 h-6 me-2.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3b82f6">
                                <path d="m226-559 78 33q14-28 29-54t33-52l-56-11-84 84Zm142 83 114 113q42-16 90-49t90-75q70-70 109.5-155.5T806-800q-72-5-158 34.5T492-656q-42 42-75 90t-49 90Zm178-65q-23-23-23-56.5t23-56.5q23-23 57-23t57 23q23 23 23 56.5T660-541q-23 23-57 23t-57-23Zm19 321 84-84-11-56q-26 18-52 32.5T532-299l33 79Zm313-653q19 121-23.5 235.5T708-419l20 99q4 20-2 39t-20 33L538-80l-84-197-171-171-197-84 167-168q14-14 33.5-20t39.5-2l99 20q104-104 218-147t235-24ZM157-321q35-35 85.5-35.5T328-322q35 35 34.5 85.5T327-151q-25 25-83.5 43T82-76q14-103 32-161.5t43-83.5Zm57 56q-10 10-20 36.5T180-175q27-4 53.5-13.5T270-208q12-12 13-29t-11-29q-12-12-29-11.5T214-265Z"/>
                            </svg>
                            Boostage
                        </button>
                    </li>
                    <!-- drawer init and show -->
                  
                </div>
               
            </div>
       
        </div>
        <div class="col-md-9 py-2 overflow-auto">
            <div class="bg-black items-center flex justify-between px-4 py-3 border-1 w-full text-white font-semibold">
                <h1 class="items-center text-xl font-semibold">@yield('title')</h1>
                <div class="relative">
                    <button id="toggleDropdown" type="button" class="px-2 py-2 text-blue-500 bg-blue-200 border-2 border-blue-400 rounded-sm hover:bg-blue-700 hover:text-white focus:outline-none">Nouveau</button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-56 rounded-md-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-3 px-4" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="{{ route('properties.form') }}" class="block px-4 border-b py-3 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Ajouter maison</a>
                            <a href="{{ route('lands.land-add') }}" class="block px-4 border-b py-3 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Ajouter terrain</a>
                            <a href="{{ route('rooms.form') }}" class="block px-4 border-b py-3 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Ajouter chambre</a>
                            <a href="{{ route('apartments.form') }}" class="block px-4 border-b py-3 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Ajouter un appartement</a>

                        </div>
                    </div>
                </div>
            </div>  
            <div id="default-tab-content" class="mt-4">
                <div class="hidden rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="property" id="property">

                        <div class="p-3 rounded-lg border overflow-auto mb-4 bg-gray-50">
                            <h3 class="font-semibold text-lg py-2"> Statistique d'ajout des logements</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-2 px-1">
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="m381-240 424-424-57-56-368 367-169-170-57 57 227 226Zm0 113L42-466l169-170 170 170 366-367 172 168-538 538Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $propertiesCount['approuver'] }}</span>
                                                <h6 class="text-lg font-semibold">Approuvés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $propertiesCount['rejeter'] }}</span>
                                                <h6 class="text-lg font-semibold">Rejetés</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="M480-240q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Zm0-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm-28-132q11 11 28 11t28-11l56-56q11-11 11-28t-11-28q-11-11-28-11t-28 11l-56 56q-11 11-11 28t11 28ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $propertiesCount['en_attente'] }}</span>
                                                <h6 class="text-lg font-semibold">En attentes</h6>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="M300-240q25 0 42.5-17.5T360-300q0-25-17.5-42.5T300-360q-25 0-42.5 17.5T240-300q0 25 17.5 42.5T300-240Zm0-360q25 0 42.5-17.5T360-660q0-25-17.5-42.5T300-720q-25 0-42.5 17.5T240-660q0 25 17.5 42.5T300-600Zm0 180q25 0 42.5-17.5T360-480q0-25-17.5-42.5T300-540q-25 0-42.5 17.5T240-480q0 25 17.5 42.5T300-420Zm360 180q25 0 42.5-17.5T720-300q0-25-17.5-42.5T660-360q-25 0-42.5 17.5T600-300q0 25 17.5 42.5T660-240Zm0-360q25 0 42.5-17.5T720-660q0-25-17.5-42.5T660-720q-25 0-42.5 17.5T600-660q0 25 17.5 42.5T660-600ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Zm460 340q25 0 42.5-17.5T720-480q0-25-17.5-42.5T660-540q-25 0-42.5 17.5T600-480q0 25 17.5 42.5T660-420ZM480-600q25 0 42.5-17.5T540-660q0-25-17.5-42.5T480-720q-25 0-42.5 17.5T420-660q0 25 17.5 42.5T480-600Zm0 360q25 0 42.5-17.5T540-300q0-25-17.5-42.5T480-360q-25 0-42.5 17.5T420-300q0 25 17.5 42.5T480-240Zm0-180q25 0 42.5-17.5T540-480q0-25-17.5-42.5T480-540q-25 0-42.5 17.5T420-480q0 25 17.5 42.5T480-420Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $propertiesCount['total'] }}</span>
                                                <h6 class="text-lg font-semibold">Totales</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                        <div class="p-3 rounded-lg border overflow-auto mb-4 bg-gray-50">
                            <h3 class="font-semibold text-lg py-2"> Statistique d'ajout des terrain</h3>
                            <!-- Si vous voulez également afficher les comptes pour les terrains, ajoutez-les ici -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-2 px-1">
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="m381-240 424-424-57-56-368 367-169-170-57 57 227 226Zm0 113L42-466l169-170 170 170 366-367 172 168-538 538Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $landsCount['approuver'] }}</span>
                                                <h6 class="text-lg font-semibold">Approuvés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $landsCount['rejeter'] }}</span>
                                                <h6 class="text-lg font-semibold">Rejetés</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="M480-240q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Zm0-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm-28-132q11 11 28 11t28-11l56-56q11-11 11-28t-11-28q-11-11-28-11t-28 11l-56 56q-11 11-11 28t11 28ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $landsCount['en_attente'] }}</span>
                                                <h6 class="text-lg font-semibold">En attentes</h6>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col mb-3">
                                    <div class=" p-2 rounded-lg bg-blue-100 flex justify-center items-center">
                                        <div class="flex  justify-between space-x-4">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#3B82F6">
                                                    <path d="M300-240q25 0 42.5-17.5T360-300q0-25-17.5-42.5T300-360q-25 0-42.5 17.5T240-300q0 25 17.5 42.5T300-240Zm0-360q25 0 42.5-17.5T360-660q0-25-17.5-42.5T300-720q-25 0-42.5 17.5T240-660q0 25 17.5 42.5T300-600Zm0 180q25 0 42.5-17.5T360-480q0-25-17.5-42.5T300-540q-25 0-42.5 17.5T240-480q0 25 17.5 42.5T300-420Zm360 180q25 0 42.5-17.5T720-300q0-25-17.5-42.5T660-360q-25 0-42.5 17.5T600-300q0 25 17.5 42.5T660-240Zm0-360q25 0 42.5-17.5T720-660q0-25-17.5-42.5T660-720q-25 0-42.5 17.5T600-660q0 25 17.5 42.5T660-600ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Zm460 340q25 0 42.5-17.5T720-480q0-25-17.5-42.5T660-540q-25 0-42.5 17.5T600-480q0 25 17.5 42.5T660-420ZM480-600q25 0 42.5-17.5T540-660q0-25-17.5-42.5T480-720q-25 0-42.5 17.5T420-660q0 25 17.5 42.5T480-600Zm0 360q25 0 42.5-17.5T540-300q0-25-17.5-42.5T480-360q-25 0-42.5 17.5T420-300q0 25 17.5 42.5T480-240Zm0-180q25 0 42.5-17.5T540-480q0-25-17.5-42.5T480-540q-25 0-42.5 17.5T420-480q0 25 17.5 42.5T480-420Z"/>
                                                </svg>
                                            </div>
                                            <div class="block">
                                               <span class="flex items-center justify-center ">{{ $landsCount['total'] }}</span>
                                                <h6 class="text-lg font-semibold">Totales</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="p-3 rounded-lg border overflow-auto mb-4 bg-gray-50">
                            <h3 class="font-semibold text-lg py-2"> Statistique des ventes</h3>
                            <div class="py-8"></div>
                        </div>
                        <div class="p-3 rounded-lg border overflow-auto mb-4 bg-gray-50">
                             <h3 class="font-semibold text-lg py-2"> Statistique de profil agent</h3>
                            {{-- <div class="">
                                <p>Vues: {{ $user->views }}</p>
                                <p>Clics: {{ $user->clicks }}</p>
                                <p>Interactions: {{ $user->interactions }}</p>
                            
                            </div> --}}

                        </div>
        
                    </div>
                </div>
                <div class="hidden p-1 rounded-lg bg-gray-50 " id="properties" role="tabpanel" aria-labelledby="properties-tab">
                    <div class="property" id="property">
                        <div class="space-y-3">
                            <div class="space-x-2 py-2">
                                <input type="checkbox" id="checkAll">
                                <span class="font-medium text-md">Tous</span>
                            </div>
                            @foreach($properties as $property)
                                <div class="bg-white rounded-sm border p-2 overflow-auto">
                                    <div class="flex justify-between items-center gap-2">
                                        <div class="flex justify-between items-center gap-2">
                                            <input type="checkbox" name="property[]" value="{{ $property->id }}" class="property-checkbox">
                                            <img class="w-24 items-center h-14 rounded-sm" style="object-position: center;object-fit: cover;"
                                                src="{{ asset('storage/' . $property->fichiers[0]) ?? asset('images/property.jpg') }}" alt="Bonnie image"/>
                                        </div>
                                        <span>{{ $property->title }}</span>
                                        <span>
                                            @if ($property->availability)
                                                <span class="badge bg-success">Disponible</span>
                                            @else
                                                <span class="badge bg-danger">Occupé</span>
                                            @endif
                                        </span>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('subscriptions.show', ['type' => 'property', 'id' => $property->id]) }}" class="btn btn-warning">Booster</a>
                                            <a href="{{ route('property.details-properties', $property->id) }}" target="_blank"
                                                class="items-center flex font-medium text-gray-900 bg-white hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                                                </svg>
                                            </a>
                                            <button type="button" onclick="toggleContent('{{ $property->id }}')" 
                                                class="items-center font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                                                <svg class="text-gray-800" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" >
                                                    <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                
                                    <div id="toggleDiv-{{ $property->id }}" class="relative hidden p-4 w-full max-w-md max-h-full">
                                        <div class="flex space-x-3">
                                            <div class="flex">
                                                <a href="{{ route('property.details-properties', $property->id) }}" target="_blank" class="block px-2 border-b py-2 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Voir</a>
                                                <a href="{{ route('property.edit', $property->id) }}" class="block px-2 border-b py-2 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Modifier</a>    
                                            </div>
                                            <div class="">
                                                <a href="{{ route('subscriptions.show', ['type' => 'property', 'id' => $property->id]) }}" class="btn btn-warning">Booster</a>
                                            </div>
                                            <form action="{{ route('property.destroy', $property->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Supprimer</button>
                                            </form>
                                            <div class="">
                                                <button type="button" onclick="toggleAvailabilityProperty('{{ $property->id }}', {{ $property->availability ? 0 : 1 }})"
                                                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-3 py-2.5">
                                                    Disponibiliter
                                                </button>  
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>                     
                            @endforeach  
                        </div>
                    </div>
                    <form id="availability-form" action="{{ route('property.update-availability', ['property' => 'PROPERTY_ID']) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="availability" id="availability-input">
                    </form>
                </div>
                <div class="hidden p-1 rounded-lg bg-gray-50 " id="lands" role="tabpanel" aria-labelledby="lands-tab">
                    <div class="land" id="land">
                        <div class="space-y-3">
                            <div class="space-x-2 py-2">
                                <input type="checkbox" id="checkAll">
                                <span class=" font-medium text-md ">Tous</span>
                            </div>
                            @foreach($lands as $land)
                                <div class="bg-white rounded-sm border p-2 overflow-auto">
                                    <div class="flex justify-between items-center gap-2">
                                        <div class="flex justify-between items-center gap-2">
                                            <input type="checkbox" name="land[]" value="{{ $land->id }}" class="land-checkbox flex justify-start">
                                            @php
                                                // Assurez-vous que $land->images est un tableau
                                                $images = $land->images;
                                            @endphp
                                            <img class="w-24 h-14 items-center rounded-sm" style="object-position: center;object-fit: cover;" 
                                                src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/land.jpg') }}" alt="land image">
                                        </div>
                                        <span>{{ $land->title }}</span>
                                        <span>
                                            @if ($land->availability)
                                                <span class="badge bg-success">Disponible</span>
                                            @else
                                                <span class="badge bg-danger">Occupé</span>
                                            @endif
                                        </span>
                                        
                                        <div class="flex space-x-2">
                                            <a href="{{ route('subscriptions.show', ['type' => 'land', 'id' => $land->id]) }}" class="btn btn-warning">Booster</a>
                                            <a href="{{ route('land.detail-land', $land->id) }}" target="_blank" 
                                                class="items-center flex font-medium text-gray-900 bg-whit hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                                                </svg>
                                            </a>
                                            <button type="button" onclick="toggleModal('{{ $land->id }}')" class="items-center font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                                                <svg class="text-gray-800" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" >
                                                    <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="landModal-{{ $land->id }}" class="hidden absolute right-0 mt-2 w-56 rounded-md-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="bg-white p-4 rounded shadow-lg">
                                        <div class="flex gap-2">
                                            <ul>
                                                <li class="border-t py-2">
                                                    <a href="{{ route('lands.edit', $land->id) }}" class="block px-4 border-b py-3 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Modifier</a>
                                                </li>
                                                <li class="border-t py-2">
                                                    <a href="{{ route('subscriptions.show', ['type' => 'land', 'id' => $land->id]) }}" class="block px-4 border-b py-3 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Booster</a>
                                                </li>
                                                <li class="border-t py-2">
                                                    <form action="{{ route('lands.destroy', $land->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger w-full" type="submit">Supprimer</button>
                                                    </form>
                                                </li>
                                                <li class="border-t py-2">
                                                    <div class="">
                                                        <button type="button" onclick="toggleAvailabilityLand('{{ $land->id }}', {{ $land->availability ? 0 : 1 }})"
                                                            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-3 py-2">
                                                            Disponibiliter
                                                        </button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <form id="availability-form" action="{{ route('land.update-availability', ['land' => 'LAND_ID']) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="availability" id="availability-input">
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 " id="statProfil" role="tabpanel" aria-labelledby="statProfil-tab">
                    <div class="container">                                
                        <h2>Graphique des Interactions</h2>
                        <canvas id="interactionChart" width="400" height="250"></canvas>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg space-y-3 bg-gray-50 " id="boostor" role="tabpanel" aria-labelledby="boostor-tab">
                    <div class="container">
                        <h1>Mes Annonces Boostées</h1>
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2"></th>
                                    <th class="px-4 py-2">Titre</th>
                                    <th class="px-4 py-2">Durée totale du boost</th>
                                    <th class="px-4 py-2">Durée restante</th>
                                </tr>
                            </thead>
                            <tbody class="space-y-2 ">
                                @foreach($subscriptions as $subscription)
                                    <tr class="bg-white rounded-sm border p-2 overflow-auto">
                                        
                                        <td class="px-4 py-2">
                                            @if($subscription->property)
                                                <img class="w-24 h-14 rounded-sm"
                                                     src="{{ asset('storage/' . $subscription->property->fichiers[0]) }}" 
                                                     alt="Property Image">
                                            @elseif($subscription->land)
                                                <img class="w-24 h-14 rounded-sm"
                                                     src="{{ asset('storage/' . $subscription->land->images[0]) }}" 
                                                     alt="Land Image">
                                            @elseif($subscription->room)
                                                <img class="w-24 h-14 rounded-sm"
                                                     src="{{ asset('storage/' . $subscription->room->images[0]) }}" 
                                                     alt="Room Image">
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            @if($subscription->property)
                                                <p class="text-sm">{{ $subscription->property->title }}</p>
                                            @elseif($subscription->land)
                                                <p class="text-sm">{{ $subscription->land->title }}</p>
                                            @elseif($subscription->room)
                                                <p class="text-sm">{{ $subscription->room->title }}</p>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                            <p>{{ $subscription->duration }} jours</p>
                                        </td>
                                        <td class="px-4 py-2">
                                            @php
                                                $now = now();
                                                $remainingDays = $now->diffInDays($subscription->end_date, false);
                                                $remainingHours = $now->diffInHours($subscription->end_date, false) % 24;
                                                $remainingMinutes = $now->diffInMinutes($subscription->end_date, false) % 60;
                                            @endphp
                                            <p>
                                                @if($remainingDays >= 1)
                                                    {{ $remainingDays }} jours
                                                @elseif($remainingHours >= 1)
                                                    {{ $remainingHours }} heures
                                                @else
                                                    {{ $remainingMinutes }} minutes
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $properties->links() }}
        </div>
        {{-- <h3 class="fex justify-center">Vous n'aviez rien publier </h3> --}}
    </div>
    

    <div class="w-full min-h-300px mt-6 rounded-t-sm bg-cover" style="background-image: url('/images/IMMAS2.png'); height:300px;" >
        <div class="p-6"></div>
        <div class="px-4 mx-auto mt-14 max-w-screen-xl text-center lg:py-20">
            <h1 class="text-4xl mt-14 font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-4xl">
                Construire ton entreprise Immobilière avec IMMAS
            </h1>
            <p class="text-xl flex justify-center text-blue-400 font-semibold">Votre Satisfaction, Notre Devise</p>          
        </div>
        <div class="flex justify-center">
            @auth
                <a href="{{route('auth.profil-complet')}}" class="no-underline hover:text-gray-800 items-center py-2 px-3 sm:ms-4 text-base font-medium text-center text-gray-900 rounded-full border border-gray-700 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 transition ease-in-out duration-300-md">
                    Devenir agent
                </a>  
            @else
                <a href="{{route('auth.agent-create')}}" class="no-underline hover:text-gray-800 items-center py-2 px-3 sm:ms-4 text-base font-medium text-center text-gray-900 rounded-full border border-gray-700 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 transition ease-in-out duration-300-md">
                    Devenir agent
                </a> 
            @endauth
            
        </div>
    </div>
        
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleDropdown = document.getElementById('toggleDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');
            // const toggleLinks = document.getElementById('toggle-links');
            // const linksList = document.getElementById('links-list');
            const checkAll = document.getElementById('checkAll');
    
            // Toggle dropdown menu
            if (toggleDropdown && dropdownMenu) {
                toggleDropdown.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });
            }
    
            // Toggle links list
            // if (toggleLinks && linksList) {
            //     toggleLinks.addEventListener('click', function() {
            //         linksList.classList.toggle('hidden');
            //     });
            // }
    
            // Check/uncheck all checkboxes
            if (checkAll) {
                checkAll.addEventListener('click', function() {
                    const checkboxes = document.querySelectorAll('.property-checkbox');
                    const checkboxesLands = document.querySelectorAll('.land-checkbox');
    
                    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                    checkboxesLands.forEach(checkbox => checkbox.checked = this.checked);
                });
            }
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButton = document.getElementById('open-modal');
            const closeModalButton = document.getElementById('close-modal');
            const modal = document.getElementById('modal');
    
            // Open modal
            openModalButton.addEventListener('click', function() {
                modal.classList.remove('hidden');
            });
    
            // Close modal
            closeModalButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
    
            // Close modal when clicking outside the modal content
            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            });
        });
     </script>
    <script>
        function toggleContent(propertyId) {
            var element = document.getElementById("toggleDiv-" + propertyId);
            if (element.classList.contains("hidden")) {
                element.classList.remove("hidden");
            } else {
                element.classList.add("hidden");
            }
        }
    </script> 
    <script>
        const ctx = document.getElementById('interactionChart').getContext('2d');
        const interactionChart = new Chart(ctx, {
            type: 'line', // or 'bar', 'pie', etc.
            data: {
                labels: @json($interactionDates), // Les dates des interactions
                datasets: [{
                    label: 'Vues',
                    data: @json($viewCounts), // Le nombre de vues
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Clicks',
                    data: @json($clickCounts), // Le nombre de clicks
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        function toggleModal(landId) {
            var modal = document.getElementById("landModal-" + landId);
            if (modal.classList.contains("hidden")) {
                modal.classList.remove("hidden");
            } else {
                modal.classList.add("hidden");
            }
        }
    </script>
     <script>
        function toggleAvailabilityProperty(propertyId, availability) {
            var form = document.getElementById('availability-form');
            var action = "{{ route('property.update-availability', ['property' => 'PROPERTY_ID']) }}";
            action = action.replace('PROPERTY_ID', propertyId);
            form.setAttribute('action', action);
            document.getElementById('availability-input').value = availability;
            form.submit();
        }
    </script>
    <script>
        function toggleAvailabilityLand(landId, availability) {
            var form = document.getElementById('availability-form');
            var action = form.getAttribute('action').replace('LAND_ID', landId);
            form.setAttribute('action', action);
            document.getElementById('availability-input').value = availability;
            form.submit();
        }
        </script>
</div>

<x-footer>

</x-footer>


