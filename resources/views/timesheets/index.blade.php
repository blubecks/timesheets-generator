<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timesheets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <x-success-message class="mb-4" />
                                
                                <div class="flex justify-end mb-4">
                                    <a class="bg-green-500 border-green-500 text-white btn border-primary border-2" href="{{ route('timesheets.create') }}">Create a Timesheet</a>
                                </div>
                                
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item bg-white border border-gray-200">
                                        <h2 class="accordion-header mb-0" id="headingOne">
                                        <button class="
                                            accordion-button
                                            relative
                                            flex
                                            items-center
                                            w-full
                                            py-4
                                            px-5
                                            text-base text-gray-800 text-left
                                            bg-white
                                            border-0
                                            rounded-none
                                            transition
                                            focus:outline-none
                                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Accordion Item #1
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body py-4 px-5">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default,
                                            until the collapse plugin adds the appropriate classes that we use to style each
                                            element. These classes control the overall appearance, as well as the showing and
                                            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                            our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item bg-white border border-gray-200">
                                        <h2 class="accordion-header mb-0" id="headingTwo">
                                        <button class="
                                            accordion-button
                                            collapsed
                                            relative
                                            flex
                                            items-center
                                            w-full
                                            py-4
                                            px-5
                                            text-base text-gray-800 text-left
                                            bg-white
                                            border-0
                                            rounded-none
                                            transition
                                            focus:outline-none
                                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Accordion Item #2
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body py-4 px-5">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                            until the collapse plugin adds the appropriate classes that we use to style each
                                            element. These classes control the overall appearance, as well as the showing and
                                            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                            our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item bg-white border border-gray-200">
                                        <h2 class="accordion-header mb-0" id="headingThree">
                                        <button class="
                                            accordion-button
                                            collapsed
                                            relative
                                            flex
                                            items-center
                                            w-full
                                            py-4
                                            px-5
                                            text-base text-gray-800 text-left
                                            bg-white
                                            border-0
                                            rounded-none
                                            transition
                                            focus:outline-none
                                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Accordion Item #3
                                        </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body py-4 px-5">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                            until the collapse plugin adds the appropriate classes that we use to style each
                                            element. These classes control the overall appearance, as well as the showing and
                                            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                            our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
