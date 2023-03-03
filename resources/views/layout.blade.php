<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'MPI TESTING') }}</title>
    @stack('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    @stack('js')
</head>

<body>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">MPI Testing</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:gap-x-12 lg:justify-end">
                <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-900">Products</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <div class="-mx-3">
                                <button type="button"
                                    class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-gray-50"
                                    aria-controls="disclosure-1" aria-expanded="false">
                                    Product
                                    <!--
                        Expand/collapse icon, toggle classes based on menu open state.

                        Open: "rotate-180", Closed: ""
                      -->
                                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- 'Product' sub-menu, show/hide based on menu state. -->
                                <div class="mt-2 space-y-2" id="disclosure-1">
                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Integrations</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Automations</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Watch
                                        demo</a>

                                    <a href="#"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact
                                        sales</a>
                                </div>
                            </div>
                            <a href="#"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                        </div>
                        <div class="py-6">
                            <a href="#"
                                class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="footer-1 bg-gray-100 py-8 sm:py-12">
        <div class="container mx-auto px-4">
            <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
                <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6">
                    <h5 class="text-xl font-bold mb-6">Features</h5>
                    <ul class="list-none footer-links">
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Cool
                                stuff</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Random
                                feature</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Team
                                feature</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Stuff
                                for developers</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Another
                                one</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Last
                                time</a>
                        </li>
                    </ul>
                </div>
                <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 sm:mt-0">
                    <h5 class="text-xl font-bold mb-6">Resources</h5>
                    <ul class="list-none footer-links">
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Resource</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Resource
                                name</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Another
                                resource</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Final
                                resource</a>
                        </li>
                    </ul>
                </div>
                <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                    <h5 class="text-xl font-bold mb-6">About</h5>
                    <ul class="list-none footer-links">
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Team</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Locations</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Privacy</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Terms</a>
                        </li>
                    </ul>
                </div>
                <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                    <h5 class="text-xl font-bold mb-6">Help</h5>
                    <ul class="list-none footer-links">
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Support</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Help
                                Center</a>
                        </li>
                        <li class="mb-2">
                            <a href="#"
                                class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Contact
                                Us</a>
                        </li>
                    </ul>
                </div>
                <div class="px-4 mt-4 sm:w-1/3 xl:w-1/6 sm:mx-auto xl:mt-0 xl:ml-auto">
                    <h5 class="text-xl font-bold mb-6 sm:text-center xl:text-left">Stay connected</h5>
                    <div class="flex sm:justify-center xl:justify-start">
                        <a href=""
                            class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 text-gray-600 hover:text-white hover:bg-blue-600 hover:border-blue-600">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href=""
                            class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 ml-2 text-gray-600 hover:text-white hover:bg-blue-400 hover:border-blue-400">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href=""
                            class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 ml-2 text-gray-600 hover:text-white hover:bg-red-600 hover:border-red-600">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:flex-wrap sm:-mx-4 mt-6 pt-6 sm:mt-12 sm:pt-12 border-t">
                <div class="sm:w-full px-4 md:w-1/6">
                    <strong>FWR</strong>
                </div>
                <div class="px-4 sm:w-1/2 md:w-1/4 mt-4 md:mt-0">
                    <h6 class="font-bold mb-2">Address</h6>
                    <address class="not-italic mb-4 text-sm">
                        123 6th St.<br>
                        Melbourne, FL 32904
                    </address>
                </div>
                <div class="px-4 sm:w-1/2 md:w-1/4 mt-4 md:mt-0">
                    <h6 class="font-bold mb-2">Free Resources</h6>
                    <p class="mb-4 text-sm">Use our HTML blocks for <strong>FREE</strong>.<br>
                        <em>All are MIT License</em></p>
                </div>
                <div class="px-4 md:w-1/4 md:ml-auto mt-6 sm:mt-4 md:mt-0">
                    <button class="px-4 py-2 bg-purple-800 hover:bg-purple-900 rounded text-white">Get Started</button>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
