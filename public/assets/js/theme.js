/**
 * Theme: DaisyUI via <html data-theme> or OS preference when "system".
 * Stored in localStorage as corporate (light), dark, or system.
 */
(function () {
  'use strict';

  var STORAGE_KEY = 'churchdb-theme';
  var THEME_LIGHT = 'corporate';
  var THEME_DARK = 'dark';
  var THEME_SYSTEM = 'system';

  function getStored() {
    try {
      var s = localStorage.getItem(STORAGE_KEY);
      if (s === THEME_DARK || s === THEME_LIGHT || s === THEME_SYSTEM) {
        return s;
      }
    } catch (e) {}
    return THEME_LIGHT;
  }

  function normalize(pref) {
    if (pref === THEME_DARK || pref === THEME_LIGHT || pref === THEME_SYSTEM) {
      return pref;
    }
    return THEME_LIGHT;
  }

  function triggerIconInner(pref) {
    if (pref === THEME_SYSTEM) {
      return '<i class="fa fa-desktop" aria-hidden="true"></i>';
    }
    if (pref === THEME_DARK) {
      return '<i class="fa fa-moon-o" aria-hidden="true"></i>';
    }
    return '<i class="fa fa-sun-o" aria-hidden="true"></i>';
  }

  function updateThemeUi(pref) {
    pref = normalize(pref);

    document.querySelectorAll('[data-theme-choice]').forEach(function (btn) {
      var v = btn.getAttribute('data-theme-choice');
      var active = v === pref;
      btn.classList.toggle('bg-base-200', active);
      btn.classList.toggle('font-semibold', active);
      if (btn.setAttribute) {
        btn.setAttribute('aria-checked', active ? 'true' : 'false');
      }
    });

    var label =
      pref === THEME_SYSTEM ? 'System theme' : pref === THEME_DARK ? 'Dark theme' : 'Light theme';
    document.querySelectorAll('[data-theme-menu-trigger]').forEach(function (el) {
      el.setAttribute('aria-label', label);
      el.setAttribute('title', label);
    });

    document.querySelectorAll('[data-theme-trigger-icon]').forEach(function (el) {
      el.innerHTML = triggerIconInner(pref);
    });
  }

  function applyTheme(pref) {
    pref = normalize(pref);
    var root = document.documentElement;

    if (pref === THEME_SYSTEM) {
      root.removeAttribute('data-theme');
    } else {
      root.setAttribute('data-theme', pref);
    }

    try {
      localStorage.setItem(STORAGE_KEY, pref);
    } catch (e) {}

    updateThemeUi(pref);
  }

  function init() {
    applyTheme(getStored());

    document.addEventListener('click', function (e) {
      var btn = e.target && e.target.closest && e.target.closest('[data-theme-choice]');
      if (!btn) {
        return;
      }
      var v = btn.getAttribute('data-theme-choice');
      if (v === THEME_LIGHT || v === THEME_DARK || v === THEME_SYSTEM) {
        applyTheme(v);
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
    get: getStored,
    LIGHT: THEME_LIGHT,
    DARK: THEME_DARK,
    SYSTEM: THEME_SYSTEM
  };
})();
