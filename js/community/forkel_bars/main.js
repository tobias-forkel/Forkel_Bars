document.observe('dom:loaded', function() {
  $$('.header').first().insert({ before: $$('#forkel_bars_adminhtml_notification').first() });
});
