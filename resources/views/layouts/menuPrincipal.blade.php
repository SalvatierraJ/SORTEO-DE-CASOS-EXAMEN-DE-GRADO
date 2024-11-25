<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['node_modules/apexcharts/dist/apexcharts.css'])
    @vite(['public/css/menu.css'])
    <title>Document</title>
</head>

<body class="flex min-h-screen" style="overflow: hidden;">
    <x-menulateral>

    </x-menulateral>

    <main id="main-content" class="flex-grow  p-6 transition-all duration-300 bg-gray-100">
        <div>
            <form class="max-w-md mx-auto">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Mockups, Logos..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

        </div>
        <div class="mt-5">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 justify-items-center">
                <div>
                    <a href="#"
                        class="block max-w-sm p-6 bg-green-600 border border-gray-200 rounded-lg shadow hover:bg-green-700">
                        <div class="flex items-center justify-between">
                            <!-- Contenedor del h4 y el párrafo -->
                            <div class="flex flex-col">
                                <h4 class="mb-2 text-5xl font-bold tracking-tight text-white">{{ $totalDC }}</h4>
                                <p class="font-normal text-white mr-2">
                                    Defensas Completadas
                                </p>
                            </div>

                            <!-- Contenedor del icono -->
                            <h4 class="mb-2 text-2xl font-bold tracking-tight text-white">
                                <svg class="w-[100px] h-[100px] fill-[#ffffff]" viewBox="0 0 448 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z">
                                    </path>
                                </svg>
                            </h4>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="#"
                        class="block max-w-sm p-6 bg-yellow-500 border border-gray-200 rounded-lg shadow hover:bg-yellow-600">
                        <div class="flex items-center justify-between">
                            <!-- Contenedor del h4 y el párrafo -->
                            <div class="flex flex-col">
                                <h4 class="mb-2 text-5xl font-bold tracking-tight text-white">{{ $totalDP }}</h4>
                                <p class="font-normal text-white mr-2">
                                    Defensas Programadas
                                </p>
                            </div>

                            <!-- Contenedor del icono -->
                            <h4 class="mb-2 text-2xl font-bold tracking-tight text-white">
                                <svg class="w-[100px] h-[100px] fill-[#ffffff]" viewBox="0 0 448 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192h80v56H48V192zm0 104h80v64H48V296zm128 0h96v64H176V296zm144 0h80v64H320V296zm80-48H320V192h80v56zm0 160v40c0 8.8-7.2 16-16 16H320V408h80zm-128 0v56H176V408h96zm-144 0v56H64c-8.8 0-16-7.2-16-16V408h80zM272 248H176V192h96v56z">
                                    </path>
                                </svg>
                            </h4>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="#"
                        class="block max-w-sm p-6 bg-red-600 border border-gray-200 rounded-lg shadow hover:bg-red-700">
                        <div class="flex items-center justify-between">
                            <!-- Contenedor del h4 y el párrafo -->
                            <div class="flex flex-col">
                                <h4 class="mb-2 text-5xl font-bold tracking-tight text-white">{{ $totalDNP }}</h4>
                                <p class="font-normal text-white mr-2">
                                    Defensas NO Programadas
                                </p>
                            </div>

                            <!-- Contenedor del icono -->
                            <h4 class="mb-2 text-2xl font-bold tracking-tight text-white">
                                <svg class="w-[100px] h-[100px] fill-[#ffffff]" viewBox="0 0 512 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M160 0c17.7 0 32 14.3 32 32V64H320V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H32V112c0-26.5 21.5-48 48-48h48V32c0-17.7 14.3-32 32-32zM32 192H480V464c0 26.5-21.5 48-48 48H80c-26.5 0-48-21.5-48-48V192zM337 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47z">
                                    </path>
                                </svg>
                            </h4>
                        </div>
                    </a>
                </div>

                <div>
                    <a href="#"
                        class="block max-w-sm p-6 bg-orange-500 border border-gray-200 rounded-lg shadow hover:bg-orange-600">
                        <div class="flex items-center justify-between">
                            <!-- Contenedor del h4 y el párrafo -->
                            <div class="flex flex-col">
                                <h4 class="mb-2 text-5xl font-bold tracking-tight text-white">{{ $totalDPH }}</h4>
                                <p class="font-normal text-white mr-2">
                                    Defensas Programadas Para Hoy
                                </p>
                            </div>

                            <!-- Contenedor del icono -->
                            <h4 class="mb-2 text-2xl font-bold tracking-tight text-white">
                                <svg class="w-[100px] h-[100px] fill-[#ffffff]" viewBox="0 0 448 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                    </path>
                                </svg>
                            </h4>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        {{-- graficos aqui van --}}
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 justify-items-center">

            <div class="p-4">
                <div class="h-[300px] flex flex-col justify-center items-center">
                    <p class="mb-1">Defensas Programadas</p>
                    <div id="hs-pie-chart"></div>

                    <!-- Legend Indicator -->
                    <div class="flex justify-center sm:justify-end items-center gap-x-4 mt-3 sm:mt-6">
                        <div class="inline-flex items-center">
                            <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>
                            <span class="text-[13px] text-gray-600">
                                Programadas
                            </span>
                        </div>

                        <div class="inline-flex items-center">
                            <span class="size-2.5 inline-block bg-cyan-400 rounded-sm me-2"></span>
                            <span class="text-[13px] text-gray-600">
                                Sin Programar
                            </span>
                        </div>
                    </div>
                    <!-- End Legend Indicator -->
                </div>
            </div>
            <div id="hs-single-bar-chart"></div>

        </div>
    </main>


</body>

@php
    $dato1 = '70,30';
    $dato2 = `'1', '2 search', '3','10'`;
@endphp

@vite(['node_modules/lodash/lodash.min.js'])
@vite(['node_modules/apexcharts/dist/apexcharts.min.js'])
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>

<script>
    window.addEventListener('load', () => {
        // Apex Pie Chart
        (function() {
            buildChart('#hs-pie-chart', () => ({
                chart: {
                    height: '100%',
                    type: 'pie',
                    zoom: {
                        enabled: false
                    }
                },
                series: [{{ $dato1 }}],
                labels: [{{ $dato2 }}],
                title: {
                    show: true
                },
                dataLabels: {
                    style: {
                        fontSize: '20px',
                        fontFamily: 'Inter, ui-sans-serif',
                        fontWeight: '400',
                        colors: ['#fff', '#1f2937']
                    },
                    dropShadow: {
                        enabled: false
                    },
                    formatter: (value) => `${value.toFixed(1)} %`
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: -15
                        }
                    }
                },
                legend: {
                    show: false
                },
                stroke: {
                    width: 4
                },
                grid: {
                    padding: {
                        top: -10,
                        bottom: -14,
                        left: -9,
                        right: -9
                    }
                },
                tooltip: {
                    enabled: false
                },
                states: {
                    hover: {
                        filter: {
                            type: 'none'
                        }
                    }
                }
            }), {
                colors: ['#3b82f6', '#22d3ee', '#e5e7eb'],
                stroke: {
                    colors: ['rgb(255, 255, 255)']
                }
            }, {
                colors: ['#3b82f6', '#22d3ee', '#404040'],
                stroke: {
                    colors: ['rgb(38, 38, 38)']
                }
            });
        })();
    });

    //aqui el de barras 
    window.addEventListener('load', () => {
        // Apex Single Bar Charts
        (function() {
            buildChart('#hs-single-bar-chart', (mode) => ({
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                series: [{
                    name: 'Sales',
                    data: [23000, 44000, 55000, 57000, 56000, 61000, 58000, 63000,
                        60000, 66000, 34000, 78000
                    ]
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '16px',
                        borderRadius: 0
                    }
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 8,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December'
                    ],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#9ca3af',
                            fontSize: '13px',
                            fontFamily: 'Inter, ui-sans-serif',
                            fontWeight: 400
                        },
                        offsetX: -2,
                        formatter: (title) => title.slice(0, 3)
                    }
                },
                yaxis: {
                    labels: {
                        align: 'left',
                        minWidth: 0,
                        maxWidth: 140,
                        style: {
                            colors: '#9ca3af',
                            fontSize: '13px',
                            fontFamily: 'Inter, ui-sans-serif',
                            fontWeight: 400
                        },
                        formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: 'darken',
                            value: 0.9
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: (value) => `$${value >= 1000 ? `${value / 1000}k` : value}`
                    },
                    custom: function(props) {
                        const {
                            categories
                        } = props.ctx.opts.xaxis;
                        const {
                            dataPointIndex
                        } = props;
                        const title = categories[dataPointIndex];
                        const newTitle = `${title}`;

                        return buildTooltip(props, {
                            title: newTitle,
                            mode,
                            hasTextLabel: true,
                            wrapperExtClasses: 'min-w-28',
                            labelDivider: ':',
                            labelExtClasses: 'ms-2'
                        });
                    }
                },
                responsive: [{
                    breakpoint: 568,
                    options: {
                        chart: {
                            height: 300
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '14px'
                            }
                        },
                        stroke: {
                            width: 8
                        },
                        labels: {
                            style: {
                                colors: '#9ca3af',
                                fontSize: '11px',
                                fontFamily: 'Inter, ui-sans-serif',
                                fontWeight: 400
                            },
                            offsetX: -2,
                            formatter: (title) => title.slice(0, 3)
                        },
                        yaxis: {
                            labels: {
                                align: 'left',
                                minWidth: 0,
                                maxWidth: 140,
                                style: {
                                    colors: '#9ca3af',
                                    fontSize: '11px',
                                    fontFamily: 'Inter, ui-sans-serif',
                                    fontWeight: 400
                                },
                                formatter: (value) => value >= 1000 ?
                                    `${value / 1000}k` : value
                            }
                        },
                    },
                }]
            }), {
                colors: ['#2563eb', '#d1d5db'],
                xaxis: {
                    labels: {
                        style: {
                            colors: '#9ca3af',
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#9ca3af'
                        }
                    }
                },
                grid: {
                    borderColor: '#e5e7eb'
                }
            }, {
                colors: ['#3b82f6', '#2563eb'],
                xaxis: {
                    labels: {
                        style: {
                            colors: '#a3a3a3',
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#a3a3a3'
                        }
                    }
                },
                grid: {
                    borderColor: '#404040'
                }
            });
        })();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
    integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
    crossorigin="anonymous"></script>
@vite(['resources/js/menu.js'])

</html>
