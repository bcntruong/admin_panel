<div class="flex space-x-2">
    <button 
        type="button" 
        class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-primary-600 bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700"
        onclick="document.querySelectorAll('[data-group={{ $groupId }}] input[type=checkbox]').forEach(function(checkbox) { checkbox.checked = true; checkbox.dispatchEvent(new Event('change')); });">
        <svg class="w-5 h-5 -ml-1 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
        {{ $selectAllLabel }}
    </button>
    <button 
        type="button" 
        class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-gray-800 shadow focus:ring-white border-gray-300 bg-white hover:bg-gray-50 focus:bg-gray-50 focus:ring-offset-gray-200"
        onclick="document.querySelectorAll('[data-group={{ $groupId }}] input[type=checkbox]').forEach(function(checkbox) { checkbox.checked = false; checkbox.dispatchEvent(new Event('change')); });">
        <svg class="w-5 h-5 -ml-1 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        {{ $deselectAllLabel }}
    </button>
</div> 