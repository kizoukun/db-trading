@extends('components.layouts.app')

@section('content')
    <div class="space-y-4">
        <!-- Slider main container -->
        <div class="swiper h-[120px]">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide bg-white rounded-lg p-3">
                    <div class="flex justify-between">
                        <div>
                            <p class="font-semibold text-lg">NVIDIA</p>
                        </div>
                        <div>
                            <p class="text-lg">NVDA</p>
                            <p class="text-green-500">+5.63</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-md md:text-xl text-gray-400">Current Value</p>
                        <p class="text-md md:text-xl text-green-500 font-semibold">$203.44</p>
                    </div>
                </div>
                <div class="swiper-slide bg-white rounded-lg p-3">
                    <div class="flex justify-between">
                        <div>
                            <p class="font-semibold text-lg">NVIDIA</p>
                        </div>
                        <div>
                            <p class="text-lg">NVDA</p>
                            <p class="text-green-500">+5.63</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-md md:text-xl text-gray-400">Current Value</p>
                        <p class="text-md md:text-xl text-green-500 font-semibold">$203.44</p>
                    </div>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 gap-5">
            <div class="col-span-1 md:col-span-2 lg:col-span-1 xl:col-span-2" id="4">
              <div
              class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 gap-2.5 px-[29px] py-[38px] rounded-[38px] bg-white"
            >
              <div class="flex flex-col justify-start items-end flex-grow-0 flex-shrink-0 relative gap-[47px]">
                <div class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 gap-[25px]">
                  <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-[25px]">
                    <div class="flex justify-start items-center flex-grow-0 flex-shrink-0 gap-[382px]">
                      <div class="flex justify-start items-center flex-grow-0 flex-shrink-0 relative">
                        <svg
                          width="57"
                          height="58"
                          viewBox="0 0 57 58"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="flex-grow-0 flex-shrink-0 w-[57px] h-[57px] relative"
                          preserveAspectRatio="xMidYMid meet"
                        >
                          <path
                            d="M53.4375 29C53.4375 42.7655 42.278 53.9375 28.5 53.9375C14.722 53.9375 3.5625 42.7655 3.5625 29C3.5625 15.222 14.722 4.06248 28.5 4.06248C42.278 4.06248 53.4375 15.222 53.4375 29Z"
                            fill="#283544"
                          ></path>
                          <path
                            d="M40.1888 22.6897C40.0527 22.7691 36.8132 24.4444 36.8132 28.159C36.9659 32.3952 40.9013 33.8808 40.9688 33.8808C40.9013 33.9602 40.3746 35.9046 38.8146 37.9429C37.5766 39.6986 36.2025 41.4688 34.1159 41.4688C32.1311 41.4688 31.4186 40.2986 29.1284 40.2986C26.6689 40.2986 25.973 41.4688 24.09 41.4688C22.0034 41.4688 20.5275 39.6037 19.222 37.8645C17.5259 35.5881 16.0843 32.0158 16.0334 28.5858C15.9991 26.7682 16.3731 24.9816 17.3223 23.464C18.6621 21.3453 21.0541 19.9071 23.6662 19.8597C25.6677 19.7968 27.4489 21.1402 28.6704 21.1402C29.8409 21.1402 32.0293 19.8597 34.5053 19.8597C35.5741 19.8608 38.4241 20.1608 40.1888 22.6897ZM28.5011 19.4968C28.1448 17.837 29.1284 16.1771 30.0445 15.1183C31.215 13.8379 33.0637 12.9688 34.658 12.9688C34.7598 14.6286 34.1148 16.2565 32.962 17.4421C31.9275 18.7226 30.1462 19.6865 28.5011 19.4968Z"
                            fill="white"
                          ></path>
                        </svg>
                        <div
                          class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-0.5"
                        >
                          <p
                            class="flex-grow-0 flex-shrink-0 text-[28.262107849121094px] font-semibold text-left text-[#212121]"
                          >
                            Apple inc
                          </p>
                          <p
                            class="flex-grow-0 flex-shrink-0 text-[18.518518447875977px] font-medium text-left text-[#848484]"
                          >
                            AAPL
                          </p>
                        </div>
                      </div>
                      <div class="flex flex-col justify-start items-end flex-grow-0 flex-shrink-0 relative gap-1.5">
                        <div class="flex justify-start items-center flex-grow-0 flex-shrink-0 relative gap-[9px]">
                          <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 gap-2.5 px-1.5 py-[3px] rounded-[100px]">
                            <div>
                              <!-- Badge Pill (small red) -->
                              <div class="font-semibold inline-flex px-2 py-1 leading-4 text-xs rounded-full text-green-700 bg-green-200">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                  <path fill-rule="evenodd" d="M10 15a.75.75 0 01-.75-.75V7.612L7.29 9.77a.75.75 0 01-1.08-1.04l3.25-3.5a.75.75 0 011.08 0l3.25 3.5a.75.75 0 11-1.08 1.04l-1.96-2.158v6.638A.75.75 0 0110 15z" clip-rule="evenodd" />
                                </svg>
                                <p>+23.41</p>
                              </div>
                            </div>
                          </div>
                          <p
                            class="flex-grow-0 flex-shrink-0 text-20 font-semibold text-left text-[#030303]">
                            $150,70
                          </p>
                        </div>
                        <p
                          class="flex-grow-0 flex-shrink-0 text-[15.696969985961914px] font-medium text-left text-[#848484]"
                        >
                          Last update at 14.30
                        </p>
                      </div>
                    </div>
                    <svg
                      width="767"
                      height="1"
                      viewBox="0 0 767 1"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      class="flex-grow-0 flex-shrink-0"
                      preserveAspectRatio="none"
                    >
                      <line y1="0.5" x2="767" y2="1.3" stroke="#E9E9E9"></line>
                    </svg>
                  </div>
                  <div class="flex justify-start items-end flex-grow-0 flex-shrink-0 gap-[21px]">
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]">
                      <p class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        1 Day
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-black"
                    >
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-white"
                      >
                        1 Week
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]"
                    >
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        1 Month
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]"
                    >
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        3 Month
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]"
                    >
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        6 Month
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]"
                    >
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        1 Year
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]"
                    >
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        5 Year
                      </p>
                    </div>
                    <div
                      class="flex justify-start items-start flex-grow-0 flex-shrink-0 relative gap-1.5 px-3 py-2 rounded-[100px] bg-white border border-[#ebedee]"
                    >
                      <svg
                        width="18"
                        height="17"
                        viewBox="0 0 18 17"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="flex-grow-0 flex-shrink-0"
                        preserveAspectRatio="none"
                      >
                        <path
                          d="M5.56635 7.5C5.56635 7.22386 5.34249 7 5.06635 7C4.7902 7 4.56635 7.22386 4.56635 7.5V14C4.56635 14.2761 4.7902 14.5 5.06635 14.5C5.34249 14.5 5.56635 14.2761 5.56635 14V7.5Z"
                          fill="black"
                        ></path>
                        <path
                          d="M8.56635 4C8.84249 4 9.06635 4.22386 9.06635 4.5V14C9.06635 14.2761 8.84249 14.5 8.56635 14.5C8.2902 14.5 8.06635 14.2761 8.06635 14V4.5C8.06635 4.22386 8.2902 4 8.56635 4Z"
                          fill="black"
                        ></path>
                        <path
                          d="M12.5663 10.5C12.5663 10.2239 12.3425 10 12.0663 10C11.7902 10 11.5663 10.2239 11.5663 10.5V14C11.5663 14.2761 11.7902 14.5 12.0663 14.5C12.3425 14.5 12.5663 14.2761 12.5663 14V10.5Z"
                          fill="black"
                        ></path>
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M0.0663452 5C0.0663452 2.23858 2.30492 0 5.06635 0H12.0663C14.8278 0 17.0663 2.23858 17.0663 5V12C17.0663 14.7614 14.8278 17 12.0663 17H5.06634C2.30492 17 0.0663452 14.7614 0.0663452 12V5ZM5.06635 1H12.0663C14.2755 1 16.0663 2.79086 16.0663 5V12C16.0663 14.2091 14.2755 16 12.0663 16H5.06634C2.85721 16 1.06635 14.2091 1.06635 12V5C1.06635 2.79086 2.85721 1 5.06635 1Z"
                          fill="black"
                        ></path>
                      </svg>
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[11.842105865478516px] font-semibold text-center text-black"
                      >
                        All
                      </p>
                    </div>
                  </div>
                </div>
                <div class="flex-grow-0 flex-shrink-0 w-[767.87px] h-[398px]">
                  <div
                    class="flex flex-col justify-start items-end absolute left-[0.27px] top-[196px] gap-[52px]"
                  >
                    <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#8c8d96]">
                      300
                    </p>
                    <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#8c8d96]">
                      250
                    </p>
                    <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-left text-[#8c8d96]">
                      200
                    </p>
                    <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#8c8d96]">
                      150
                    </p>
                    <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#8c8d96]">
                      100
                    </p>
                    <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#8c8d96]">
                      50
                    </p>
                  </div>
                  <div class="flex justify-start items-start absolute left-[62.27px] top-[553px] gap-[74px]">
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Mon
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">15</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Tue
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">16</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Wed
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">17</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Thu
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">18</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Fri
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">19</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Sat
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">20</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Sun
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">21</p>
                    </div>
                    <div
                      class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-medium text-center text-[#c3c5d4]">
                        Mon
                      </p>
                      <p class="flex-grow-0 flex-shrink-0 text-sm font-medium text-center text-[#8c8d96]">22</p>
                    </div>
                  </div>
                  <svg
                    width="4"
                    height="336"
                    viewBox="0 0 4 336"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-[260.77px] top-[196.5px]"
                    preserveAspectRatio="none"
                  >
                    <line
                      x1="1.7655"
                      y1="1.5"
                      x2="1.7655"
                      y2="334.5"
                      stroke="#002D24"
                      stroke-width="3"
                      stroke-linecap="round"
                      stroke-dasharray="12 9"
                    ></line></svg>
                    <svg
                    width="738"
                    height="336"
                    viewBox="0 0 738 336"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-[737px] h-[336px]"
                    preserveAspectRatio="none"
                  >
                    <rect x="0.765503" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="92.7655" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="0.765503" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="92.7655" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="184.766" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="276.766" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="184.766" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="276.766" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="368.766" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="460.766" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="368.766" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="460.766" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="552.766" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="644.766" y="0.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="552.766" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="644.766" y="67.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="0.765503" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="92.7655" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="0.765503" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="92.7655" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="184.766" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="276.766" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="184.766" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="276.766" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="368.766" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="460.766" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="368.766" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="460.766" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="552.766" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="644.766" y="134.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="552.766" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="644.766" y="201.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="0.765503" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="92.7655" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="184.766" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="276.766" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="368.766" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="460.766" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="552.766" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect>
                    <rect x="644.766" y="268.5" width="92" height="67" stroke="#E9E9E9"></rect></svg>
                    <svg
                    width="728"
                    height="302"
                    viewBox="0 0 728 302"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-[727px] h-[301.5px] absolute left-[33.27px] top-[241px]"
                    preserveAspectRatio="none"
                  >
                    <path
                      d="M14.2655 259.5H0.265503V301.5H727.266V83.5L715.266 123L698.766 142.5L691.266 234.5L662.266 177.5H637.766L622.766 118L613.266 159.5L608.266 148.5H599.766L586.266 78.5L573.266 119.5L556.266 20L543.266 64L529.766 69.5L508.766 168L491.266 121.5L481.266 174.5L458.266 165L449.766 259.5L425.266 173L409.766 164L397.766 50.5H386.766L373.266 113L360.266 24.5L346.266 53L334.766 5L325.766 0L312.766 74.5L303.266 42.5L287.766 82.5H279.266L274.266 111L258.766 156H247.766L233.766 55L222.766 102L201.766 121.5L203.266 133.5L193.266 156L189.266 179L177.766 190.5L161.266 264.5L147.266 156H140.266L131.766 195H114.766L85.2655 237L64.7655 139H54.7655L44.2655 237L18.7655 275L14.2655 259.5Z"
                      fill="url(#paint0_linear_1_457)"
                    ></path>
                    <defs>
                      <linearGradient
                        id="paint0_linear_1_457"
                        x1="363.766"
                        y1="-632.5"
                        x2="363.766"
                        y2="301.5"
                        gradientUnits="userSpaceOnUse"
                      >
                        <stop stop-color="#46B49E"></stop>
                        <stop offset="1" stop-color="#46B49E" stop-opacity="0"></stop>
                      </linearGradient>
                    </defs></svg>
                    <svg
                    width="738"
                    height="282"
                    viewBox="0 0 738 282"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-[735px] h-[275px] absolute left-[33.13px] top-60"
                    preserveAspectRatio="none"
                  >
                    <path
                      d="M2.13269 262.5H16.1327L20.6327 278L46.1327 240L56.6327 142H66.6327L87.1327 240L116.633 198H133.633L142.133 159H149.133L163.133 267.5L179.633 193.5L191.133 182L195.133 159L205.133 136.5L203.633 124.5L224.633 105L235.633 58L249.633 159H260.633L276.133 114L281.133 85.5H289.633L305.133 45.5L314.633 77.5L327.633 3L336.633 8L348.133 56L362.133 27.5L375.133 116L388.633 53.5H399.633L411.633 167L427.133 176L451.633 262.5L460.133 168L483.133 177.5L493.133 124.5L510.633 171L531.633 72.5L545.133 67L558.133 23L575.133 122.5L588.133 81.5L601.633 151.5H610.133L615.133 162.5L624.633 121L639.633 180.5H664.133L693.133 237.5L700.633 145.5L717.133 126L729.133 86.5"
                      stroke="#46B49E"
                      stroke-width="3"
                      stroke-linecap="round"
                    ></path></svg><svg
                    width="31"
                    height="30"
                    viewBox="0 0 31 30"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-[255.27px] top-[332px]"
                    preserveAspectRatio="none"
                  >
                    <g filter="url(#filter0_d_1_461)">
                      <circle cx="15.2655" cy="11" r="5" fill="#46B49E"></circle>
                      <circle cx="15.2655" cy="11" r="8" stroke="white" stroke-width="6"></circle>
                    </g>
                    <defs>
                      <filter
                        id="filter0_d_1_461"
                        x="0.265503"
                        y="0"
                        width="30"
                        height="30"
                        filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB"
                      >
                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                        <feColorMatrix
                          in="SourceAlpha"
                          type="matrix"
                          values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                          result="hardAlpha"
                        ></feColorMatrix>
                        <feOffset dy="4"></feOffset>
                        <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                        <feComposite in2="hardAlpha" operator="out"></feComposite>
                        <feColorMatrix
                          type="matrix"
                          values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"
                        ></feColorMatrix>
                        <feBlend
                          mode="normal"
                          in2="BackgroundImageFix"
                          result="effect1_dropShadow_1_461"
                        ></feBlend>
                        <feBlend
                          mode="normal"
                          in="SourceGraphic"
                          in2="effect1_dropShadow_1_461"
                          result="shape"
                        ></feBlend>
                      </filter>
                    </defs>
                  </svg>
                  <div
                    class="flex flex-col justify-start items-start absolute left-[131.27px] top-[347px] gap-2.5 px-[13px] py-2.5 rounded-[14px] bg-black/[0.65]"
                  >
                    <div
                      class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 relative gap-[3px]"
                    >
                      <p class="flex-grow-0 flex-shrink-0 text-[10px] font-semibold text-left text-[#e9e9e9]">
                        21 Sept on 12.00
                      </p>
                      <p
                        class="flex-grow-0 flex-shrink-0 text-[16.774892807006836px] font-bold text-left text-[#e9e9e9]"
                      >
                        $190,70.90
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div id="5">
                <div  class="p-4 rounded-[20px] bg-white">
                    <h1 class="font-bold text-lg lg:text-2xl mb-4">My WatchList</h1>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAMAAACfWMssAAAAUVBMVEX///9mZmZeXl5iYmJXV1daWlqlpaXBwcH8/Py0tLRubm6rq6vw8PCIiIiBgYHc3Nz29vbQ0NCfn590dHTj4+OQkJDq6upSUlKWlpbHx8e6urpx1ZffAAABmElEQVRIib2W65KDIAyFIQQvULRg1db3f9AFu91tazTQmd38ZOabE5KTgBB/GX3dfECdg9bzuZyrUUkJ5YoVyhimmLM6cepayvlVT2pfyDVq5coztbByWCoo7noQSrnLekNwpZy4pUz1WMyJBUHLupwTfbD5ZTnVYXTXZfo5aHrrBjM42x9hF4egYgAae0kHfgQNqZvqMGuL3x1PxURTBaV/D2Kdup0hcVq+hFLy7UCeKG4EyYUyxHy1muViDtsSTchz4AhB934hQo8y3zTzguR0WV4QSQsYPtGO4k58aYA0jud7gRMF1nzzgeJEy4PyU5BedRmg+hREcqZyikOukZ5vhyLXXYYBdhrJW3XHcxlTJXVLgEuGAyQSds1ZAJGstiQ/VynAbJqS49ZEbl71c1au1Bq4ZtSVtHpWefSN6MiYI0lwObYjBTMKS5suxsAki+RjlZI9Hi6kE03hj6657f3zNZ9JBc9PK+xd8B4WHxAOwYYOH485w6VfUdSBuavvhWh8iN8HgJmYiw0aKv/ygPaLbcm18b/xBf8tD08u8Xy+AAAAAElFTkSuQmCC" class="rounded-full h-[64px] w-[64px]">
                                <div>
                                    <p class="font-bold text-xl lg:text-2xl">SPOT</p>
                                    <p
                                        class="text-[19.124753952026367px] font-semibold text-left text-gray-500"
                                    >
                                        Spotify
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <div>
                                    <p class="font-bold text-xl lg:text-2xl">$310,40</p>
                                    <p
                                        class="text-[19.124753952026367px] font-semibold text-end text-red-500"
                                    >
                                        -1,10%
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAMAAACfWMssAAAAUVBMVEX///9mZmZeXl5iYmJXV1daWlqlpaXBwcH8/Py0tLRubm6rq6vw8PCIiIiBgYHc3Nz29vbQ0NCfn590dHTj4+OQkJDq6upSUlKWlpbHx8e6urpx1ZffAAABmElEQVRIib2W65KDIAyFIQQvULRg1db3f9AFu91tazTQmd38ZOabE5KTgBB/GX3dfECdg9bzuZyrUUkJ5YoVyhimmLM6cepayvlVT2pfyDVq5coztbByWCoo7noQSrnLekNwpZy4pUz1WMyJBUHLupwTfbD5ZTnVYXTXZfo5aHrrBjM42x9hF4egYgAae0kHfgQNqZvqMGuL3x1PxURTBaV/D2Kdup0hcVq+hFLy7UCeKG4EyYUyxHy1muViDtsSTchz4AhB934hQo8y3zTzguR0WV4QSQsYPtGO4k58aYA0jud7gRMF1nzzgeJEy4PyU5BedRmg+hREcqZyikOukZ5vhyLXXYYBdhrJW3XHcxlTJXVLgEuGAyQSds1ZAJGstiQ/VynAbJqS49ZEbl71c1au1Bq4ZtSVtHpWefSN6MiYI0lwObYjBTMKS5suxsAki+RjlZI9Hi6kE03hj6657f3zNZ9JBc9PK+xd8B4WHxAOwYYOH485w6VfUdSBuavvhWh8iN8HgJmYiw0aKv/ygPaLbcm18b/xBf8tD08u8Xy+AAAAAElFTkSuQmCC" class="rounded-full h-[64px] w-[64px]">
                                <div>
                                    <p class="font-bold text-xl lg:text-2xl">SPOT</p>
                                    <p
                                        class="text-[19.124753952026367px] font-semibold text-left text-gray-500"
                                    >
                                        Spotify
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <div>
                                    <p class="font-bold text-xl lg:text-2xl">$310,40</p>
                                    <p
                                        class="text-[19.124753952026367px] font-semibold text-end text-red-500"
                                    >
                                        -1,10%
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAMAAACfWMssAAAAUVBMVEX///9mZmZeXl5iYmJXV1daWlqlpaXBwcH8/Py0tLRubm6rq6vw8PCIiIiBgYHc3Nz29vbQ0NCfn590dHTj4+OQkJDq6upSUlKWlpbHx8e6urpx1ZffAAABmElEQVRIib2W65KDIAyFIQQvULRg1db3f9AFu91tazTQmd38ZOabE5KTgBB/GX3dfECdg9bzuZyrUUkJ5YoVyhimmLM6cepayvlVT2pfyDVq5coztbByWCoo7noQSrnLekNwpZy4pUz1WMyJBUHLupwTfbD5ZTnVYXTXZfo5aHrrBjM42x9hF4egYgAae0kHfgQNqZvqMGuL3x1PxURTBaV/D2Kdup0hcVq+hFLy7UCeKG4EyYUyxHy1muViDtsSTchz4AhB934hQo8y3zTzguR0WV4QSQsYPtGO4k58aYA0jud7gRMF1nzzgeJEy4PyU5BedRmg+hREcqZyikOukZ5vhyLXXYYBdhrJW3XHcxlTJXVLgEuGAyQSds1ZAJGstiQ/VynAbJqS49ZEbl71c1au1Bq4ZtSVtHpWefSN6MiYI0lwObYjBTMKS5suxsAki+RjlZI9Hi6kE03hj6657f3zNZ9JBc9PK+xd8B4WHxAOwYYOH485w6VfUdSBuavvhWh8iN8HgJmYiw0aKv/ygPaLbcm18b/xBf8tD08u8Xy+AAAAAElFTkSuQmCC" class="rounded-full h-[64px] w-[64px]">
                                <div>
                                    <p class="font-bold text-xl lg:text-2xl">SPOT</p>
                                    <p
                                        class="text-[19.124753952026367px] font-semibold text-left text-gray-500"
                                    >
                                        Spotify
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <div>
                                    <p class="font-bold text-xl lg:text-2xl">$310,40</p>
                                    <p
                                        class="text-[19.124753952026367px] font-semibold text-end text-red-500"
                                    >
                                        -1,10%
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1>Stock List</h1>
    @foreach($stocks as $stock)
        <div>
            <a href="/dashboard/stocks/{{$stock->symbol}}">
                {{ $stock->symbol }}
            </a>
        </div>
    @endforeach
    <h1>Your Portfolio</h1>
    @foreach($user_stock_amounts as $user_stock)
        <div>
            <a href="/dashboard/stocks/{{$user_stock->symbol}}">
                {{ $user_stock->symbol }}
            </a>
            <span>Owned: {{ $user_stock->amount }}</span>
        </div>
    @endforeach
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            spaceBetween: 15,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 5,
                },
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
