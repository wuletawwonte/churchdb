/**
 * Light/dark theme: DaisyUI data-theme on <html>, persisted in localStorage.
 */
(function () {
  'use strict';

  var STORAGE_KEY = 'churchdb-theme';
  var THEME_LIGHT = 'corporate';
  var THEME_DARK = 'dark';

  function getAppliedTheme() {
    var t = document.documentElement.getAttribute('data-theme');
    return t === THEME_DARK ? THEME_DARK : THEME_LIGHT;
  }

  function applyTheme(theme) {
    if (theme !== THEME_LIGHT && theme !== THEME_DARK) {
      theme = THEME_LIGHT;
    }
    document.documentElement.setAttribute('data-theme', theme);
    try {
      localStorage.setItem(STORAGE_KEY, theme);
    } catch (e) {}
    syncToggleInputs(theme === THEME_DARK);
  }

  function syncToggleInputs(isDark) {
    document.querySelectorAll('input[data-theme-toggle][type="checkbox"]').forEach(function (el) {
      el.checked = isDark;
    });
  }

  function toggle() {
    applyTheme(getAppliedTheme() === THEME_DARK ? THEME_LIGHT : THEME_DARK);
  }

  function init() {
    var stored = null;
    try {
      stored = localStorage.getItem(STORAGE_KEY);
    } catch (e) {}

    if (stored === THEME_LIGHT || stored === THEME_DARK) {
      applyTheme(stored);
    } else {
      syncToggleInputs(getAppliedTheme() === THEME_DARK);
    }

    document.addEventListener('change', function (e) {
      var el = e.target;
      if (el && el.matches && el.matches('input[data-theme-toggle][type="checkbox"]')) {
        applyTheme(el.checked ? THEME_DARK : THEME_LIGHT);
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  window.ChurchDBTheme = {
    apply: applyTheme,
    toggle: toggle,
    LIGHT: THEME_LIGHT,
    DARK: THEME_DARK
  };
})();
