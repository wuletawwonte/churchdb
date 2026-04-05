/**
 * Small UI helpers after Bootstrap removal (alerts, DaisyUI <dialog> triggers).
 */
(function () {
  'use strict';

  var SIDEBAR_KEY = 'churchdb-sidebar';

  function drawerRoot() {
    return document.getElementById('layout-drawer-root');
  }

  function drawerCheckbox() {
    return document.getElementById('layout-drawer');
  }

  function isLgSidebarPinnedOpen() {
    var r = drawerRoot();
    return !!(r && r.classList.contains('lg:drawer-open'));
  }

  function setLgSidebarPinnedOpen(open) {
    var r = drawerRoot();
    var cb = drawerCheckbox();
    if (!r || !cb) return;
    if (open) {
      r.classList.add('lg:drawer-open');
      cb.checked = false;
      try {
        localStorage.setItem(SIDEBAR_KEY, 'open');
      } catch (err) {}
    } else {
      r.classList.remove('lg:drawer-open');
      cb.checked = false;
      try {
        localStorage.setItem(SIDEBAR_KEY, 'closed');
      } catch (err) {}
    }
    updateSidebarToggleButton();
  }

  function updateSidebarToggleButton() {
    var btn = document.querySelector('[data-sidebar-toggle]');
    if (!btn) return;
    var open = isLgSidebarPinnedOpen();
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    var i = btn.querySelector('i');
    if (i) {
      i.className = 'fa text-lg ' + (open ? 'fa-angle-double-left' : 'fa-bars');
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    updateSidebarToggleButton();
    var btn = document.querySelector('[data-sidebar-toggle]');
    if (btn) {
      btn.addEventListener('click', function () {
        setLgSidebarPinnedOpen(!isLgSidebarPinnedOpen());
      });
    }
  });

  document.addEventListener('click', function (e) {
    var dismissAlert = e.target.closest('[data-dismiss="alert"]');
    if (dismissAlert) {
      e.preventDefault();
      var alertEl = dismissAlert.closest('.alert');
      if (alertEl) {
        alertEl.remove();
      }
      return;
    }

    var openModal = e.target.closest('[data-open-modal]');
    if (openModal) {
      e.preventDefault();
      var id = openModal.getAttribute('data-open-modal');
      if (id) {
        var dlg = document.getElementById(id);
        if (dlg && typeof dlg.showModal === 'function') {
          dlg.showModal();
        }
      }
      return;
    }

    var tab = e.target.closest('a[data-toggle="tab"]');
    if (tab) {
      e.preventDefault();
      var href = tab.getAttribute('href');
      if (!href || href.charAt(0) !== '#') return;
      var wrap = tab.closest('.nav-tabs-custom') || document.body;
      var ul = tab.closest('ul.nav-tabs');
      if (ul) {
        ul.querySelectorAll('li').forEach(function (li) {
          li.classList.remove('active');
        });
        var parentLi = tab.closest('li');
        if (parentLi) parentLi.classList.add('active');
      }
      wrap.querySelectorAll('.tab-pane').forEach(function (pane) {
        pane.classList.remove('active');
      });
      var pane = document.querySelector(href);
      if (pane) pane.classList.add('active');
    }
  });
})();
