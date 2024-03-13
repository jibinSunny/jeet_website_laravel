<!DOCTYPE html>
<!-- DOCTYPE html-->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="{{ asset('frontend/css/app.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/css/tiny-slider.css')}}">
</head>

<body>
    <header class="inset-x-0 top-0 flex items-center flex-nowrap bg-white-500 p-1 mx-auto z-50 w-full px-10 lg:px-16 fixed bg-white">
        <div class="top-0 left-0 absolute w-fulltransition duration-500 ease-in-out bg-teal-500 h-0" id="v1-background"></div>
        <div class="flex items-start flex-col lg:flex-auto mr-6 flex-1">
            <div class="block text-4xl font-bold leading-none">Jeet</div>
            <p>School Management</p>
        </div>
        <div
            class="block lg:hidden"><button class="flex items-center px-3 py-2 border rounded text-black-200 border-black-400 hover:text-white hover:border-white"><svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></button></div>
            <div class="lg:flex flex-grow lg:w-3/4 xl:w-4/5 lg:justify-end hidden">
                <div class="w-full block lg:flex lg:items-center lg:w-auto">
                    <div><a class="inline-block text-base font-medium text-gray-800 px-3 py-2 leading-none rounded-lg border-dark mt-4 lg:mt-0 md:mr-2" href="#">Home</a><a class="inline-block text-base font-medium text-gray-800 px-3 py-2 leading-none rounded-lg border-primary-500 mt-4 lg:mt-0 md:mr-2" href="javascript:;" id="about">About Us</a><a class="inline-block text-base font-medium text-gray-800 px-3 py-2 leading-none rounded-lg border-primary-500 mt-4 lg:mt-0 md:mr-2" href="javascript:;" id="features">Features</a><a class="inline-block text-base font-medium text-gray-800 px-3 py-2 leading-none rounded-lg border-primary-500 mt-4 lg:mt-0 md:mr-2"
                        href="#">Pricing</a><a class="inline-block text-base font-medium text-gray-800 px-3 py-2 leading-none rounded-lg border-primary-500 mt-4 lg:mt-0 md:mr-2" href="#">Contact</a></div>
                </div>
                <div class="relative flex md:justify-center lg:pl-5">
                    <a href="{{ route('showLogin') }}"><button class="bg-white hover:bg-gray-100 border-2 text-gray-900 px-4 font-bold rounded">
                      Sign In
                    </button></a>
                </div>
                </div>
    </header>

    <div class="hero_Header container mx-auto flex flex-col-reverse mt-8 lg:mt-0 lg:flex-row items-center h-auto lg:h-screen bg-no-repeat bg-1" style="{{ asset('frontend/img/boomerang.svg')}}">
        <div class="w-full lg:w-2/5 px-10 lg:px-0">
            <div class="hero_Title text-5xl lg:text-6xl font-semibold leading-none text-gray-800">
                Free School Management Software & App
            </div>
            <p class="text-gray-600 text-xl mt-4">Ensuring effortless management for</p>
            <ul class="flex mt-2 items-center mb-10">
                <li class="text-xl mr-4">Admin</li>
                <div class="dot w-2 h-2 bg-gray-500 rounded-full"></div>
                <li class="text-xl mx-4">Teachers</li>
                <div class="dot w-2 h-2 bg-gray-500 rounded-full"></div>
                <li class="text-xl mx-4">Parents</li>
                <div class="dot w-2 h-2 bg-gray-500 rounded-full"></div>
                <li class="text-xl mx-4">Students</li>
            </ul>
            <div class="relative flex md:justify-start mt-4">
                <button class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded mr-3 shadow flex items-center font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mr-2" viewBox="0 0 23.817 28"><g transform="translate(0 0)"><path d="M4.072,0A3.936,3.936,0,0,0,2.036.614,4.581,4.581,0,0,0,0,4.4V23.6a4.572,4.572,0,0,0,2.014,3.788,4.1,4.1,0,0,0,4.247.043l.043-.022L21.737,17.8a4.508,4.508,0,0,0,0-7.6L6.3.592,6.261.57A4.176,4.176,0,0,0,4.072,0Zm.065,2.78a1.357,1.357,0,0,1,.679.2c.017.009.027.012.044.022l15.411,9.567a1.732,1.732,0,0,1,0,2.845L4.86,25.022l-.044.022a1.124,1.124,0,0,1-1.269-.022A1.749,1.749,0,0,1,2.8,23.576V4.423a1.694,1.694,0,0,1,.722-1.444,1.194,1.194,0,0,1,.613-.2Z" fill="#fff"/></g></svg> Try Online Demo
                </button>
                <button class="bg-white hover:bg-gray-100 shadow-lg text-gray-900 px-4 font-semibold rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mr-2" viewBox="0 0 24.934 28"><g transform="translate(-28.5 0)"><path d="M41.094,31.764l-1.368,1.461L28.939,44.744a2.614,2.614,0,0,1-.439-1.462V20.412a2.605,2.605,0,0,1,.505-1.557L39.726,30.3Z" transform="translate(0 -17.846)" fill="#6aa9ff"/><path d="M78.919,8.345l-3.943,4.113L72.494,9.871,63.121.094a2.494,2.494,0,0,1,1.936.249l7.437,4.294Z" transform="translate(-32.768 0)" fill="#a8ebfa"/><path d="M76.9,280.4l-6.524,3.767-7.437,4.294a2.521,2.521,0,0,1-1.263.343,2.488,2.488,0,0,1-.793-.131l9.493-9.9,2.481-2.588Z" transform="translate(-30.654 -260.8)" fill="#ff5b5b"/><path d="M313.746,173.735l-4.053-2.34-4.263,4.447,4.363,4.551,3.953-2.282a2.526,2.526,0,0,0,0-4.375Z" transform="translate(-261.576 -161.924)" fill="#ff9f00"/><path d="M239.641,229.247l-1.368,1.427V227.82Z" transform="translate(-198.286 -215.33)" fill="#2682ff"/><path d="M240.754,94.447l-2.481-2.588V86.625l6.424,3.709Z" transform="translate(-198.213 -81.847)" fill="#76e2f8"/><path d="M244.8,280.4l-6.524,3.767v-5.4l2.481-2.588Z" transform="translate(-198.211 -260.943)" fill="#ff3636"/></g></svg> Try App Here
                </button>
            </div>
        </div>
        <div class="w-4/5 lg:w-3/5 mt-10">
            <img src="{{ asset('frontend/img/dashboard.png')}}" class="w-full h-auto">
        </div>
    </div>

    <section class="jeet-content-wrapper relative w-11/12 lg:justify-center mx-auto" id="about_section">
        <div class="items-container mx-auto mt-8 w-full">
            <div class="jeet-header mx-auto justify-center flex">
                <div class="block text-center">
                    <div class="jeet-title font-semibold text-gray-800 text-5xl">Apps for everyone</div>
                    <p class="text-gray-600 text-xl">Lorem Ipsum is simply dummy text of printing</p>
                </div>
            </div>

            <div class="app-for-everyone">
                <div class="card-wrapper flex lg:flex-no-wrap flex-wrap mt-10 px-10 lg:px-20">
                    <div class="card-item mb-10">
                        <div class="card-icon h-20">
                            <img src="{{ asset('frontend/img/students.svg')}}" class="h-16">
                        </div>
                        <div class="card-title text-2xl font-medium mb-1">Student Login</div>
                        <p class="text-gray-700">Manage your school remotely. Send emergency notices, track teacher leaves, Students progress & much more. track payments, track school buses.</p>
                        <button class="bg-teal-600 hover:bg-teal-700 text-white px-3 py-1 rounded mr-3 shadow flex items-center font-semibold mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mr-2" viewBox="0 0 23.817 28"><g transform="translate(0 0)"><path d="M4.072,0A3.936,3.936,0,0,0,2.036.614,4.581,4.581,0,0,0,0,4.4V23.6a4.572,4.572,0,0,0,2.014,3.788,4.1,4.1,0,0,0,4.247.043l.043-.022L21.737,17.8a4.508,4.508,0,0,0,0-7.6L6.3.592,6.261.57A4.176,4.176,0,0,0,4.072,0Zm.065,2.78a1.357,1.357,0,0,1,.679.2c.017.009.027.012.044.022l15.411,9.567a1.732,1.732,0,0,1,0,2.845L4.86,25.022l-.044.022a1.124,1.124,0,0,1-1.269-.022A1.749,1.749,0,0,1,2.8,23.576V4.423a1.694,1.694,0,0,1,.722-1.444,1.194,1.194,0,0,1,.613-.2Z" fill="#fff"/></g></svg> Login
                        </button>
                    </div>

                    <div class="card-item mb-10">
                        <div class="card-icon h-20">
                            <img src="{{ asset('frontend/img/teachers.svg')}}" class="h-20">
                        </div>
                        <div class="card-title text-2xl font-medium mb-1">Teacher Login</div>
                        <p class="text-gray-700">Manage your school remotely. Send emergency notices, track teacher leaves, Students progress & much more. track payments, track school buses.</p>
                        <button class="bg-teal-600 hover:bg-teal-700 text-white px-3 py-1 rounded mr-3 shadow flex items-center font-semibold mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mr-2" viewBox="0 0 23.817 28"><g transform="translate(0 0)"><path d="M4.072,0A3.936,3.936,0,0,0,2.036.614,4.581,4.581,0,0,0,0,4.4V23.6a4.572,4.572,0,0,0,2.014,3.788,4.1,4.1,0,0,0,4.247.043l.043-.022L21.737,17.8a4.508,4.508,0,0,0,0-7.6L6.3.592,6.261.57A4.176,4.176,0,0,0,4.072,0Zm.065,2.78a1.357,1.357,0,0,1,.679.2c.017.009.027.012.044.022l15.411,9.567a1.732,1.732,0,0,1,0,2.845L4.86,25.022l-.044.022a1.124,1.124,0,0,1-1.269-.022A1.749,1.749,0,0,1,2.8,23.576V4.423a1.694,1.694,0,0,1,.722-1.444,1.194,1.194,0,0,1,.613-.2Z" fill="#fff"/></g></svg> Login
                        </button>
                    </div>

                    <div class="card-item mb-10">
                        <div class="card-icon h-20">
                            <img src="{{ asset('frontend//img/parents.svg')}}" class="h-16">
                        </div>
                        <div class="card-title text-2xl font-medium mb-1">Parent Login</div>
                        <p class="text-gray-700">Manage your school remotely. Send emergency notices, track teacher leaves, Students progress & much more. track payments, track school buses.</p>
                        <button class="bg-teal-600 hover:bg-teal-700 text-white px-3 py-1 rounded mr-3 shadow flex items-center font-semibold mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mr-2" viewBox="0 0 23.817 28"><g transform="translate(0 0)"><path d="M4.072,0A3.936,3.936,0,0,0,2.036.614,4.581,4.581,0,0,0,0,4.4V23.6a4.572,4.572,0,0,0,2.014,3.788,4.1,4.1,0,0,0,4.247.043l.043-.022L21.737,17.8a4.508,4.508,0,0,0,0-7.6L6.3.592,6.261.57A4.176,4.176,0,0,0,4.072,0Zm.065,2.78a1.357,1.357,0,0,1,.679.2c.017.009.027.012.044.022l15.411,9.567a1.732,1.732,0,0,1,0,2.845L4.86,25.022l-.044.022a1.124,1.124,0,0,1-1.269-.022A1.749,1.749,0,0,1,2.8,23.576V4.423a1.694,1.694,0,0,1,.722-1.444,1.194,1.194,0,0,1,.613-.2Z" fill="#fff"/></g></svg> Login
                        </button>
                    </div>

                    <div class="card-item mb-10">
                        <div class="card-icon h-20">
                            <img src="{{ asset('frontend/img/admin.svg')}}" class="h-16">
                        </div>
                        <div class="card-title text-2xl font-medium mb-1">Admin Login</div>
                        <p class="text-gray-700">Manage your school remotely. Send emergency notices, track teacher leaves, Students progress & much more. track payments, track school buses.</p>
                        <button class="bg-teal-600 hover:bg-teal-700 text-white px-3 py-1 rounded mr-3 shadow flex items-center font-semibold mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mr-2" viewBox="0 0 23.817 28"><g transform="translate(0 0)"><path d="M4.072,0A3.936,3.936,0,0,0,2.036.614,4.581,4.581,0,0,0,0,4.4V23.6a4.572,4.572,0,0,0,2.014,3.788,4.1,4.1,0,0,0,4.247.043l.043-.022L21.737,17.8a4.508,4.508,0,0,0,0-7.6L6.3.592,6.261.57A4.176,4.176,0,0,0,4.072,0Zm.065,2.78a1.357,1.357,0,0,1,.679.2c.017.009.027.012.044.022l15.411,9.567a1.732,1.732,0,0,1,0,2.845L4.86,25.022l-.044.022a1.124,1.124,0,0,1-1.269-.022A1.749,1.749,0,0,1,2.8,23.576V4.423a1.694,1.694,0,0,1,.722-1.444,1.194,1.194,0,0,1,.613-.2Z" fill="#fff"/></g></svg> Login
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative w-11/12 lg:justify-center mx-auto px-5 lg:px-20 mt-10 lg:mt-32">
        <div class="items-container mx-auto mt-8 w-full flex flex-wrap items-center">
            <div class="jeet-bg w-full lg:w-2/5">
                <div class="bg-container py-48 bg-gray-200 inline-block relative w-full rounded overflow-hidden">
                    <div class="jeet-bg absolute inset-0" style="background-image:url('{{ asset('frontend/img/efficient.jpg')}}'"></div>
                </div>
            </div>
            <div class="jeet-header justify-center inline-block lg:ml-10 max-w-xl">
                <div class="inline-block">
                    <div class="jeet-title font-semibold text-gray-800 text-3xl lg:text-5xl">Efficient Management</div>
                    <p class="text-gray-600 text-xl">Experience HD video calling with your classroom. Initiate Meeting from Teacher App and all students will join virtual classroom from their students app. And it Free.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative lg:justify-center mt-24 bg-black-500 pt-6 pb-6" id="feature_section">
        <div class="items-container mx-auto mt-8 w-full">
            <div class="jeet-header mx-auto justify-center flex">
                <div class="block text-center">
                    <div class="jeet-title font-semibold text-gray-800 text-3xl lg:text-5xl">Features - We have it All</div>
                    <p class="text-gray-600 text-xl">10+ Unique Features for complete digitalization of
                        your institute and more coming soon.</p>
                </div>
            </div>

            <div class="features">
                <div class="card-wrapper flex flex-wrap mt-10 px-20">
                    <div class="card-item bg-white p-6 rounded-md lg:mr-16 mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/fee-collection.svg')}}" class="h-12">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Online Fee Collection</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md lg:mr-16 mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/communication.svg')}}" class="h-12">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Communication to Parents</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/live-bus.svg')}}" class="h-12">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Live Bus Tracking</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md lg:mr-16 mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/online-reports.svg')}}" class="h-10">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Online Reports</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md lg:mr-16 mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/attendance.svg')}}" class="h-12">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Student Attendance</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/staff-management.svg')}}" class="h-10">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Staff Management</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md lg:mr-16 mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/calendar.svg')}}" class="h-14">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Academic Calendar</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md lg:mr-16 mb-10">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/exam.svg')}}" class="h-12">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Exam & Results</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>

                    <div class="card-item bg-white p-6 rounded-md table">
                        <div class="card-icon inline-block float-left h-20 mr-5">
                            <img src="{{ asset('frontend/img/roles.svg')}}" class="h-14">
                        </div>
                        <div class="card-title text-xl font-bold mb-1">Roles & Responsibility</div>
                        <p class="text-gray-700 table">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative lg:justify-center pt-20 pb-20">
        <div class="items-container mx-auto w-full">
            <div class="jeet-header mx-auto justify-center flex flex-wrap">
                <div class="flex flex-wrap justify-center items-center text-center">
                    <div class="jeet-title font-medium text-gray-800 text-2xl mr-8">Book a demo today and and save 25%</div>
                    <button class="bg-teal-600 hover:bg-teal-700 text-xl text-white px-4 py-2 rounded mr-3 shadow mt-3 lg:mt-0">
                        Book Now
                      </button>
                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative lg:justify-center mx-auto px-5 lg:px-20 py-20 bg-black-500">
        <div class="items-container mx-auto mt-8 w-11/12 flex flex-wrap items-center">
            <div class="jeet-bg w-full lg:w-2/5">
                <div class="bg-container py-48 bg-gray-200 inline-block relative w-full rounded overflow-hidden">
                    <div class="jeet-bg absolute inset-0" style="background-image:url('{{ asset('frontend/img/')}}"></div>
          </div>
            </div>
            <div class="jeet-header justify-center inline-block lg:ml-10 max-w-xl mt-3 lg:mt-0">
                <div class="inline-block">
                    <p class="text-gray-600 text-xl">Introducing</p>
                    <div class="jeet-title text-gray-800 text-5xl leading-none font-bold">Jeet Connect</div>
                    <p class="text-gray-600 text-xl mt-3">Experience HD video calling with your classroom. Initiate Meeting from Teacher App and all students will join virtual classroom from their students app. And it Free.</p>
                    <button class="bg-teal-600 hover:bg-teal-700 text-xl text-white px-4 py-2 rounded mr-3 mt-3 font-bold shadow">
                        Explore Jeet App
                      </button>
                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative lg:justify-center mx-auto px-2 lg:px-20 pt-10">
        <div class="items-container mx-auto mt-8 w-11/12 flex items-center justify-center border-b-2 pb-16">
            <div class="jeet-header justify-center inline-block lg:ml-10 max-w-4xl">
                <div class="inline-block text-center">
                    <p class="text-gray-800 text-2xl lg:text-3xl leading-tight mt-3">"Super beautiful, well done! If you are looking for a magical and romantic place then this is a great place to go! I’d recommend this to anyone who loves a good adventure!"</p>
                      <div class="avatar-container flex justify-center items-center mt-10">
                        <div class="avatar relative w-16 h-16 overflow-hidden rounded-full inline-block mr-5">
                            <img src="../default/assets/img/avatar.jpg" class="absolute">
                        </div>
                        <div class="avatar-text text-left">
                            <h2 class="text-2xl text-gray-800">Amy Johnson</h2>
                            <p class="text-gray-700">Principal</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative w-11/12 lg:justify-center mx-auto mt-8 lg:mt-20 pb-20">
        <div class="items-container mx-auto mt-8 w-full">
            <div class="jeet-header mx-auto justify-center flex">
                <div class="block text-center">
                    <div class="jeet-title font-medium text-gray-800 text-3xl lg:text-5xl">Thank you for participating</div>
                    <p class="text-gray-600 text-xl">Lorem Ipsum is simply dummy text of printing</p>
                </div>
            </div>

            <div class="app-for-everyone flex flex-wrap justify-between max-w-5xl mx-auto mt-12">
                <div class="number w-6/12 lg:w-auto text-center mb-10 lg:mb-0">
                    <div class="number_count font-semibold text-5xl leading-none text-gray-800">15+</div>
                    <div class="number-text text-gray-600 text-xl">Countries</div>
                </div>
                <div class="number w-6/12 lg:w-auto text-center mb-10 lg:mb-0">
                    <div class="number_count font-semibold text-5xl leading-none text-gray-800">250+</div>
                    <div class="number-text text-gray-600 text-xl">Schools</div>
                </div>
                <div class="number w-6/12 lg:w-auto text-center">
                    <div class="number_count font-semibold text-5xl leading-none text-gray-800">22+</div>
                    <div class="number-text text-gray-600 text-xl">College</div>
                </div>
                <div class="number w-6/12 lg:w-auto text-center">
                    <div class="number_count font-semibold text-5xl leading-none text-gray-800">120+</div>
                    <div class="number-text text-gray-600 text-xl">Institution</div>
                </div>
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative lg:justify-center mx-auto px-20 py-16 bg-black-500">
        <div class="items-container mx-auto w-11/12">
            <div class="jeet-header mx-auto justify-center flex">
                <div class="block text-center">
                    <div class="jeet-title font-semibold text-gray-800 text-3xl lg:text-5xl">Our Clients</div>
                    <p class="text-gray-600 text-xl">Lorem Ipsum is simply dummy text of printing</p>
                </div>
            </div>
        </div>

        <div class="slider-items flex justify-between mt-10 slick slick-theme">
            <div class="item shadow-lg">
                <img src="{{ asset('frontend/img/item-1.jpg')}}" class="w-full h-auto">
            </div>
            <div class="item shadow-lg">
                <img src="{{ asset('frontend/img/item-2.jpg')}}" class="w-full h-auto">
            </div>
            <div class="item shadow-lg">
                <img src="{{ asset('frontend/img/item-3.jpe')}}g" class="w-full h-auto">
            </div>
            <div class="item shadow-lg">
                <img src="{{ asset('frontend/img/item-4.png')}}" class="w-full h-auto">
            </div>
            <div class="item shadow-lg">
                <img src="{{ asset('frontend/img/item-1.jpg')}}" class="w-full h-auto">
            </div>
            <div class="item shadow-lg">
                <img src="{{ asset('frontend/img/item-1.jpg')}}" class="w-full h-auto">
            </div>
        </div>
    </section>

    <section class="jeet-content-wrapper relative lg:justify-center mx-auto px-20 py-16">
        <div class="items-container mx-auto w-11/12">
            <div class="jeet-header mx-auto justify-center flex">
                <div class="block text-center">
                    <div class="jeet-title font-medium text-gray-800 text-3xl lg:text-5xl">Explore Jeet Now. Try Our Demo</div>
                    <p class="text-gray-600 text-xl max-w-2xl leading-tight">We don't sell your info. We don't do ads. Our business model ensures our ability
                        to act in your best interest while storing and securing your data.</p>
                </div>
            </div>
        </div>
        <div class="relative flex md:justify-center mt-8">
            <button class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded mr-3 shadow flex items-center font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mr-2" viewBox="0 0 23.817 28"><g transform="translate(0 0)"><path d="M4.072,0A3.936,3.936,0,0,0,2.036.614,4.581,4.581,0,0,0,0,4.4V23.6a4.572,4.572,0,0,0,2.014,3.788,4.1,4.1,0,0,0,4.247.043l.043-.022L21.737,17.8a4.508,4.508,0,0,0,0-7.6L6.3.592,6.261.57A4.176,4.176,0,0,0,4.072,0Zm.065,2.78a1.357,1.357,0,0,1,.679.2c.017.009.027.012.044.022l15.411,9.567a1.732,1.732,0,0,1,0,2.845L4.86,25.022l-.044.022a1.124,1.124,0,0,1-1.269-.022A1.749,1.749,0,0,1,2.8,23.576V4.423a1.694,1.694,0,0,1,.722-1.444,1.194,1.194,0,0,1,.613-.2Z" fill="#fff"/></g></svg> Try Online Demo
            </button>
            <button class="bg-white hover:bg-gray-100 shadow-lg text-gray-900 px-4 font-semibold rounded flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mr-2" viewBox="0 0 24.934 28"><g transform="translate(-28.5 0)"><path d="M41.094,31.764l-1.368,1.461L28.939,44.744a2.614,2.614,0,0,1-.439-1.462V20.412a2.605,2.605,0,0,1,.505-1.557L39.726,30.3Z" transform="translate(0 -17.846)" fill="#6aa9ff"/><path d="M78.919,8.345l-3.943,4.113L72.494,9.871,63.121.094a2.494,2.494,0,0,1,1.936.249l7.437,4.294Z" transform="translate(-32.768 0)" fill="#a8ebfa"/><path d="M76.9,280.4l-6.524,3.767-7.437,4.294a2.521,2.521,0,0,1-1.263.343,2.488,2.488,0,0,1-.793-.131l9.493-9.9,2.481-2.588Z" transform="translate(-30.654 -260.8)" fill="#ff5b5b"/><path d="M313.746,173.735l-4.053-2.34-4.263,4.447,4.363,4.551,3.953-2.282a2.526,2.526,0,0,0,0-4.375Z" transform="translate(-261.576 -161.924)" fill="#ff9f00"/><path d="M239.641,229.247l-1.368,1.427V227.82Z" transform="translate(-198.286 -215.33)" fill="#2682ff"/><path d="M240.754,94.447l-2.481-2.588V86.625l6.424,3.709Z" transform="translate(-198.213 -81.847)" fill="#76e2f8"/><path d="M244.8,280.4l-6.524,3.767v-5.4l2.481-2.588Z" transform="translate(-198.211 -260.943)" fill="#ff3636"/></g></svg> Try App Here
            </button>
        </div>
    </section>

    <footer class="jeet-content-wrapper relative lg:justify-center mx-auto py-16 bg-black-500">
        <div class="items-container mx-auto w-11/12 flex flex-wrap">
            <div class="footer-widget jeet-widget justify-start lg:justify-center flex flex-wrap lg:max-w-sm mb-10 lg:mb-0">
                <div class="flex flex-wrap items-start flex-col mr-6">
                    <div class="block text-5xl font-bold">Jeet</div>
                    <p class="text-gray-700 text-xl border-b-2 pb-5">We don't sell your info. We don't do ads. Our business model ensures our ability
                        to act in your best interest while storing and securing your data.</p>
                        <p class="text-gray-800 text-xl mt-4">Payments Accepted</p>
                </div>
            </div>

            <div class="footer-widget jeet-widget justify-start lg:justify-center flex flex-wrap lg:flex-1 w-full mb-10 lg:mb-0">
                <div class="flex flex-wrap items-start flex-col mr-6">
                    <div class="block text-3xl font-medium">Why Jeet</div>
                    <ul class="leading-relaxed">
                        <li class="text-xl text-gray-700">10 Reasons</li>
                        <li class="text-xl text-gray-700">Custom ERP</li>
                        <li class="text-xl text-gray-700">Mobile App</li>
                        <li class="text-xl text-gray-700">Pricing & Plans</li>
                    </ul>
                </div>
            </div>

            <div class="footer-widget jeet-widget justify-start lg:justify-center flex flex-wrap w-full lg:flex-1 mb-10 lg:mb-0">
                <div class="flex flex-wrap items-start flex-col mr-6">
                    <div class="block text-3xl font-medium">Help</div>
                    <ul class="leading-relaxed">
                        <li class="text-xl text-gray-700">About</li>
                        <li class="text-xl text-gray-700">Contact</li>
                        <li class="text-xl text-gray-700">Terms</li>
                        <li class="text-xl text-gray-700">Privacy</li>
                    </ul>
                </div>
            </div>

            <div class="footer-widget jeet-widget justify-start lg:justify-center flex flex-wrap w-full lg:flex-1">
                <div class="flex flex-wrap items-start flex-col mr-6">
                    <div class="block text-3xl font-medium">Follow</div>
                    <ul class="leading-relaxed">
                        <li class="text-xl text-gray-700">Facebook</li>
                        <li class="text-xl text-gray-700">Twitter</li>
                        <li class="text-xl text-gray-700">Linked In</li>
                        <li class="text-xl text-gray-700">Instagram</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

	<script src=" {{ asset('frontend/js/app.js') }}"></script>
	<script src=" {{ asset('frontend/js/tiny-slider.js') }} "></script>
	<script src=" {{ asset('frontend/js/scrollToElement.js')}} "></script>

    <script>
        // or if you already have a reference to the element
var elem = document.querySelector('#features');
elem.addEventListener('click', e => {
    scrollToElement('#feature_section', {
	offset: 0,
	ease: 'out-bounce',
	duration: 1500
});
  })

  var Aboutelem = document.querySelector('#about');
  Aboutelem.addEventListener('click', e => {
    scrollToElement('#about_section', {
	offset: 0,
	ease: 'out-bounce',
	duration: 1500
});
  })
    </script>



    <script>
var slider = tns({
    container: '.slider-items',
    items: 1,
    loop:true,
    gutter:50,
    autoplay: true,
    controls:false,
    autoplayButtonOutput:false,
    responsive: {
      640: {
        edgePadding: 20,
        gutter: 50,
        items: 1
      },
      700: {
        items: 4
      },
      900: {
        items: 5
      }
    }
  });
    </script>
</body>
</html>
