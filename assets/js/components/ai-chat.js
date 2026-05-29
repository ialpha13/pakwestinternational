(() => {
  const init = () => {
    const toggleBtn = document.querySelector('.js-ai-toggle');
    const panel = document.querySelector('.js-ai-panel');
    if (!toggleBtn || !panel) return;

    const closeBtn = panel.querySelector('.js-ai-close');
    const messagesEl = panel.querySelector('.js-ai-messages');
    const inputEl = panel.querySelector('.js-ai-input');
    const sendBtn = panel.querySelector('.js-ai-send');
    const typingEl = panel.querySelector('.ai-typing');

    if (!messagesEl || !inputEl || !sendBtn) return;

    const state = {
      loading: false,
      messages: [
        {
          role: 'model',
          text: 'Hello! I am the Pakwest Sales Assistant. How can I help you with your manufacturing needs today?'
        }
      ]
    };

    const scrollToBottom = () => {
      messagesEl.scrollTop = messagesEl.scrollHeight;
    };

    const renderMessage = (message) => {
      const wrapper = document.createElement('div');
      wrapper.className = `flex ${message.role === 'user' ? 'justify-end' : 'justify-start'}`;

      const bubble = document.createElement('div');
      bubble.className = `max-w-[85%] p-3 rounded-2xl text-sm ${
        message.role === 'user'
          ? 'bg-blue-600 text-white rounded-tr-none'
          : 'bg-white text-gray-800 shadow-sm border border-gray-100 rounded-tl-none'
      }`;
      bubble.textContent = message.text;

      wrapper.appendChild(bubble);
      messagesEl.appendChild(wrapper);
      scrollToBottom();
    };

    const setLoading = (value) => {
      state.loading = value;
      if (typingEl) {
        typingEl.classList.toggle('hidden', !value);
      }
      sendBtn.disabled = value;
    };

    const openPanel = () => {
      panel.classList.add('is-open');
      toggleBtn.classList.add('is-hidden');
      if (messagesEl.childElementCount === 0) {
        state.messages.forEach(renderMessage);
      }
      inputEl.focus();
    };

    const closePanel = () => {
      panel.classList.remove('is-open');
      toggleBtn.classList.remove('is-hidden');
    };

    const sendMessage = async () => {
      const text = inputEl.value.trim();
      if (!text || state.loading) return;

      const userMessage = { role: 'user', text };
      state.messages.push(userMessage);
      renderMessage(userMessage);
      inputEl.value = '';

      setLoading(true);

      try {
        const response = await fetch(window.APP?.buildUrl('api/ai-chat.php') || 'api/ai-chat.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ message: text, history: state.messages })
        });
        const data = await response.json();
        const replyText = data && data.reply ? data.reply : 'Thanks for reaching out. A trade specialist will reply shortly.';
        const modelMessage = { role: 'model', text: replyText };
        state.messages.push(modelMessage);
        renderMessage(modelMessage);
      } catch (error) {
        const fallback = {
          role: 'model',
          text: 'Our AI assistant is currently offline. Please reach us at exports@pakwestintl.com.'
        };
        state.messages.push(fallback);
        renderMessage(fallback);
      } finally {
        setLoading(false);
      }
    };

    toggleBtn.addEventListener('click', openPanel);
    if (closeBtn) closeBtn.addEventListener('click', closePanel);
    sendBtn.addEventListener('click', sendMessage);
    inputEl.addEventListener('keypress', (event) => {
      if (event.key === 'Enter') {
        event.preventDefault();
        sendMessage();
      }
    });
  };

  if (window.APP && typeof window.APP.onReady === 'function') {
    window.APP.onReady(init);
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
