@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between my-4">
        <div class="flex justify-between flex-1 sm:hidden">

            <?php
                $classes_for_when_buttons_are_disabled = "inline-flex items-center px-4 py-2 text-sm font-medium  leading-5 cursor-not-allowed rounded-md
                                                            text-zinc-300 bg-slate-50
                                                            dark:bg-zinc-900 dark:text-zinc-700";
                $classes_for_when_square_buttons_are_disabled = "inline-flex items-center px-4 py-2 text-sm font-medium border border-transparent leading-5 cursor-not-allowed
                                                                    text-zinc-300 bg-slate-50
                                                                    dark:bg-zinc-900 dark:text-zinc-700";
                $classes_for_when_buttons_are_enabled  = "inline-flex items-center px-4 py-2 text-sm font-medium border leading-5 rounded-md
                                                            bg-zinc-200 hover:border-zinc-500
                                                            dark:bg-zinc-800";
                $classes_for_when_square_buttons_are_enabled  = "inline-flex items-center px-4 py-2 text-sm font-medium border border-transparent border leading-5
                                                                    bg-zinc-200 hover:border-zinc-500
                                                                    dark:bg-zinc-800";
            ?>
            @if ($paginator->onFirstPage())
                <span class="<?= $classes_for_when_buttons_are_disabled ?>">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="<?= $classes_for_when_buttons_are_enabled ?>">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="<?= $classes_for_when_buttons_are_enabled ?>">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="<?= $classes_for_when_buttons_are_disabled ?>">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden justify-between w-full sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-inherit leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md overflow-hidden">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="<?= $classes_for_when_square_buttons_are_disabled ?> rounded-l-md" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="<?= $classes_for_when_square_buttons_are_enabled ?> rounded-l-md" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="<?= $classes_for_when_square_buttons_are_disabled ?>">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="<?= $classes_for_when_square_buttons_are_enabled ?>" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="<?= $classes_for_when_square_buttons_are_enabled ?> rounded-r-md" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="<?= $classes_for_when_square_buttons_are_disabled ?> rounded-r-md" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
