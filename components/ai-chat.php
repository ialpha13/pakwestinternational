<?php
require_once __DIR__ . '/../includes/functions.php';
?>
<button
  class="ai-toggle fixed bottom-6 right-6 z-40 bg-blue-600 text-white p-4 rounded-full shadow-2xl hover:bg-blue-700 transition-all group js-ai-toggle"
  type="button"
  aria-label="Open assistant"
>
  <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
  </svg>
</button>

<div class="ai-panel fixed inset-0 z-50 flex items-end justify-end p-6 pointer-events-none js-ai-panel">
  <div class="w-full max-w-md h-[600px] bg-white rounded-2xl shadow-2xl flex flex-col pointer-events-auto border border-gray-100 overflow-hidden">
    <div class="bg-blue-600 p-4 text-white flex justify-between items-center">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center border border-blue-400">
          <span class="text-xs font-bold">PW</span>
        </div>
        <div>
          <h3 class="font-semibold text-sm">Product Assistant</h3>
          <p class="text-[10px] text-blue-100">AI Powered Agent</p>
        </div>
      </div>
      <button class="hover:text-gray-200 js-ai-close" type="button" aria-label="Close assistant">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 js-ai-messages"></div>

    <div class="ai-typing hidden px-4 pb-4 bg-gray-50">
      <div class="bg-white border border-gray-100 p-3 rounded-2xl rounded-tl-none shadow-sm flex gap-1 w-fit">
        <div class="w-1.5 h-1.5 bg-gray-300 rounded-full animate-bounce"></div>
        <div class="w-1.5 h-1.5 bg-gray-300 rounded-full animate-bounce [animation-delay:0.2s]"></div>
        <div class="w-1.5 h-1.5 bg-gray-300 rounded-full animate-bounce [animation-delay:0.4s]"></div>
      </div>
    </div>

    <div class="p-4 border-t border-gray-100 bg-white">
      <div class="flex gap-2">
        <input
          type="text"
          class="js-ai-input flex-1 text-sm bg-gray-100 border-none rounded-full px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"
          placeholder="Ask about products, MOQ, shipping..."
        />
        <button
          class="js-ai-send bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 disabled:opacity-50 transition-colors"
          type="button"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
