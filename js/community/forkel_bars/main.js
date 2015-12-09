document.observe('dom:loaded', function() {
  $$('.header').first().insert({ before: $$('#forkel_bar_adminhtml_message').first() });
});
