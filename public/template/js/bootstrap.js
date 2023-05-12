/*!
 * Bootstrap v4.1.1 (https://getbootstrap.com/)
 * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
!(function (t, e) {
  "object" == typeof exports && "undefined" != typeof module
    ? e(exports, require("jquery"))
    : "function" == typeof define && define.amd
    ? define(["exports", "jquery"], e)
    : e((t.bootstrap = {}), t.jQuery);
})(this, function (t, e) {
  "use strict";
  function i(t, e) {
    for (var n = 0; n < e.length; n++) {
      var i = e[n];
      (i.enumerable = i.enumerable || !1),
        (i.configurable = !0),
        "value" in i && (i.writable = !0),
        Object.defineProperty(t, i.key, i);
    }
  }
  function s(t, e, n) {
    return e && i(t.prototype, e), n && i(t, n), t;
  }
  function c(r) {
    for (var t = 1; t < arguments.length; t++) {
      var o = null != arguments[t] ? arguments[t] : {},
        e = Object.keys(o);
      "function" == typeof Object.getOwnPropertySymbols &&
        (e = e.concat(
          Object.getOwnPropertySymbols(o).filter(function (t) {
            return Object.getOwnPropertyDescriptor(o, t).enumerable;
          })
        )),
        e.forEach(function (t) {
          var e, n, i;
          (e = r),
            (i = o[(n = t)]),
            n in e
              ? Object.defineProperty(e, n, {
                  value: i,
                  enumerable: !0,
                  configurable: !0,
                  writable: !0,
                })
              : (e[n] = i);
        });
    }
    return r;
  }
  for (
    var r,
      n,
      o,
      a,
      l,
      f,
      h,
      u,
      d,
      p,
      g,
      m,
      _,
      v,
      E,
      y,
      b,
      T,
      C,
      w,
      I,
      D,
      A,
      S,
      O,
      N,
      k,
      L,
      P,
      x,
      j,
      M,
      R,
      H,
      W,
      F,
      U,
      B,
      K,
      V,
      Q,
      Y,
      G,
      q,
      z,
      X,
      J,
      Z,
      $,
      tt,
      et,
      nt,
      it,
      rt,
      ot,
      st,
      at,
      lt,
      ct,
      ft,
      ht,
      ut,
      dt,
      pt,
      gt = (function (i) {
        var e = "transitionend";
        function t(t) {
          var e = this,
            n = !1;
          return (
            i(this).one(l.TRANSITION_END, function () {
              n = !0;
            }),
            setTimeout(function () {
              n || l.triggerTransitionEnd(e);
            }, t),
            this
          );
        }
        var l = {
          TRANSITION_END: "bsTransitionEnd",
          getUID: function (t) {
            for (
              ;
              (t += ~~(1e6 * Math.random())), document.getElementById(t);

            );
            return t;
          },
          getSelectorFromElement: function (t) {
            var e = t.getAttribute("data-target");
            (e && "#" !== e) || (e = t.getAttribute("href") || "");
            try {
              return 0 < i(document).find(e).length ? e : null;
            } catch (t) {
              return null;
            }
          },
          getTransitionDurationFromElement: function (t) {
            if (!t) return 0;
            var e = i(t).css("transition-duration");
            return parseFloat(e)
              ? ((e = e.split(",")[0]), 1e3 * parseFloat(e))
              : 0;
          },
          reflow: function (t) {
            return t.offsetHeight;
          },
          triggerTransitionEnd: function (t) {
            i(t).trigger(e);
          },
          supportsTransitionEnd: function () {
            return Boolean(e);
          },
          isElement: function (t) {
            return (t[0] || t).nodeType;
          },
          typeCheckConfig: function (t, e, n) {
            for (var i in n)
              if (Object.prototype.hasOwnProperty.call(n, i)) {
                var r = n[i],
                  o = e[i],
                  s =
                    o && l.isElement(o)
                      ? "element"
                      : ((a = o),
                        {}.toString
                          .call(a)
                          .match(/\s([a-z]+)/i)[1]
                          .toLowerCase());
                if (!new RegExp(r).test(s))
                  throw new Error(
                    t.toUpperCase() +
                      ': Option "' +
                      i +
                      '" provided type "' +
                      s +
                      '" but expected type "' +
                      r +
                      '".'
                  );
              }
            var a;
          },
        };
        return (
          (i.fn.emulateTransitionEnd = t),
          (i.event.special[l.TRANSITION_END] = {
            bindType: e,
            delegateType: e,
            handle: function (t) {
              if (i(t.target).is(this))
                return t.handleObj.handler.apply(this, arguments);
            },
          }),
          l
        );
      })((e = e && e.hasOwnProperty("default") ? e.default : e)),
      mt =
        ((n = "alert"),
        (a = "." + (o = "bs.alert")),
        (l = (r = e).fn[n]),
        (f = {
          CLOSE: "close" + a,
          CLOSED: "closed" + a,
          CLICK_DATA_API: "click" + a + ".data-api",
        }),
        (h = "alert"),
        (u = "fade"),
        (d = "show"),
        (p = (function () {
          function i(t) {
            this._element = t;
          }
          var t = i.prototype;
          return (
            (t.close = function (t) {
              var e = this._element;
              t && (e = this._getRootElement(t)),
                this._triggerCloseEvent(e).isDefaultPrevented() ||
                  this._removeElement(e);
            }),
            (t.dispose = function () {
              r.removeData(this._element, o), (this._element = null);
            }),
            (t._getRootElement = function (t) {
              var e = gt.getSelectorFromElement(t),
                n = !1;
              return e && (n = r(e)[0]), n || (n = r(t).closest("." + h)[0]), n;
            }),
            (t._triggerCloseEvent = function (t) {
              var e = r.Event(f.CLOSE);
              return r(t).trigger(e), e;
            }),
            (t._removeElement = function (e) {
              var n = this;
              if ((r(e).removeClass(d), r(e).hasClass(u))) {
                var t = gt.getTransitionDurationFromElement(e);
                r(e)
                  .one(gt.TRANSITION_END, function (t) {
                    return n._destroyElement(e, t);
                  })
                  .emulateTransitionEnd(t);
              } else this._destroyElement(e);
            }),
            (t._destroyElement = function (t) {
              r(t).detach().trigger(f.CLOSED).remove();
            }),
            (i._jQueryInterface = function (n) {
              return this.each(function () {
                var t = r(this),
                  e = t.data(o);
                e || ((e = new i(this)), t.data(o, e)),
                  "close" === n && e[n](this);
              });
            }),
            (i._handleDismiss = function (e) {
              return function (t) {
                t && t.preventDefault(), e.close(this);
              };
            }),
            s(i, null, [
              {
                key: "VERSION",
                get: function () {
                  return "4.1.1";
                },
              },
            ]),
            i
          );
        })()),
        r(document).on(
          f.CLICK_DATA_API,
          '[data-dismiss="alert"]',
          p._handleDismiss(new p())
        ),
        (r.fn[n] = p._jQueryInterface),
        (r.fn[n].Constructor = p),
        (r.fn[n].noConflict = function () {
          return (r.fn[n] = l), p._jQueryInterface;
        }),
        p),
      _t =
        ((m = "button"),
        (v = "." + (_ = "bs.button")),
        (E = ".data-api"),
        (y = (g = e).fn[m]),
        (b = "active"),
        (T = "btn"),
        (w = '[data-toggle^="button"]'),
        (I = '[data-toggle="buttons"]'),
        (D = "input"),
        (A = ".active"),
        (S = ".btn"),
        (O = {
          CLICK_DATA_API: "click" + v + E,
          FOCUS_BLUR_DATA_API: (C = "focus") + v + E + " blur" + v + E,
        }),
        (N = (function () {
          function n(t) {
            this._element = t;
          }
          var t = n.prototype;
          return (
            (t.toggle = function () {
              var t = !0,
                e = !0,
                n = g(this._element).closest(I)[0];
              if (n) {
                var i = g(this._element).find(D)[0];
                if (i) {
                  if ("radio" === i.type)
                    if (i.checked && g(this._element).hasClass(b)) t = !1;
                    else {
                      var r = g(n).find(A)[0];
                      r && g(r).removeClass(b);
                    }
                  if (t) {
                    if (
                      i.hasAttribute("disabled") ||
                      n.hasAttribute("disabled") ||
                      i.classList.contains("disabled") ||
                      n.classList.contains("disabled")
                    )
                      return;
                    (i.checked = !g(this._element).hasClass(b)),
                      g(i).trigger("change");
                  }
                  i.focus(), (e = !1);
                }
              }
              e &&
                this._element.setAttribute(
                  "aria-pressed",
                  !g(this._element).hasClass(b)
                ),
                t && g(this._element).toggleClass(b);
            }),
            (t.dispose = function () {
              g.removeData(this._element, _), (this._element = null);
            }),
            (n._jQueryInterface = function (e) {
              return this.each(function () {
                var t = g(this).data(_);
                t || ((t = new n(this)), g(this).data(_, t)),
                  "toggle" === e && t[e]();
              });
            }),
            s(n, null, [
              {
                key: "VERSION",
                get: function () {
                  return "4.1.1";
                },
              },
            ]),
            n
          );
        })()),
        g(document)
          .on(O.CLICK_DATA_API, w, function (t) {
            t.preventDefault();
            var e = t.target;
            g(e).hasClass(T) || (e = g(e).closest(S)),
              N._jQueryInterface.call(g(e), "toggle");
          })
          .on(O.FOCUS_BLUR_DATA_API, w, function (t) {
            var e = g(t.target).closest(S)[0];
            g(e).toggleClass(C, /^focus(in)?$/.test(t.type));
          }),
        (g.fn[m] = N._jQueryInterface),
        (g.fn[m].Constructor = N),
        (g.fn[m].noConflict = function () {
          return (g.fn[m] = y), N._jQueryInterface;
        }),
        N),
      vt =
        ((L = "carousel"),
        (x = "." + (P = "bs.carousel")),
        (j = ".data-api"),
        (M = (k = e).fn[L]),
        (R = {
          interval: 5e3,
          keyboard: !0,
          slide: !1,
          pause: "hover",
          wrap: !0,
        }),
        (H = {
          interval: "(number|boolean)",
          keyboard: "boolean",
          slide: "(boolean|string)",
          pause: "(string|boolean)",
          wrap: "boolean",
        }),
        (W = "next"),
        (F = "prev"),
        (U = "left"),
        (B = "right"),
        (K = {
          SLIDE: "slide" + x,
          SLID: "slid" + x,
          KEYDOWN: "keydown" + x,
          MOUSEENTER: "mouseenter" + x,
          MOUSELEAVE: "mouseleave" + x,
          TOUCHEND: "touchend" + x,
          LOAD_DATA_API: "load" + x + j,
          CLICK_DATA_API: "click" + x + j,
        }),
        (V = "carousel"),
        (Q = "active"),
        (Y = "slide"),
        (G = "carousel-item-right"),
        (q = "carousel-item-left"),
        (z = "carousel-item-next"),
        (X = "carousel-item-prev"),
        (J = {
          ACTIVE: ".active",
          ACTIVE_ITEM: ".active.carousel-item",
          ITEM: ".carousel-item",
          NEXT_PREV: ".carousel-item-next, .carousel-item-prev",
          INDICATORS: ".carousel-indicators",
          DATA_SLIDE: "[data-slide], [data-slide-to]",
          DATA_RIDE: '[data-ride="carousel"]',
        }),
        (Z = (function () {
          function o(t, e) {
            (this._items = null),
              (this._interval = null),
              (this._activeElement = null),
              (this._isPaused = !1),
              (this._isSliding = !1),
              (this.touchTimeout = null),
              (this._config = this._getConfig(e)),
              (this._element = k(t)[0]),
              (this._indicatorsElement = k(this._element).find(
                J.INDICATORS
              )[0]),
              this._addEventListeners();
          }
          var t = o.prototype;
          return (
            (t.next = function () {
              this._isSliding || this._slide(W);
            }),
            (t.nextWhenVisible = function () {
              !document.hidden &&
                k(this._element).is(":visible") &&
                "hidden" !== k(this._element).css("visibility") &&
                this.next();
            }),
            (t.prev = function () {
              this._isSliding || this._slide(F);
            }),
            (t.pause = function (t) {
              t || (this._isPaused = !0),
                k(this._element).find(J.NEXT_PREV)[0] &&
                  (gt.triggerTransitionEnd(this._element), this.cycle(!0)),
                clearInterval(this._interval),
                (this._interval = null);
            }),
            (t.cycle = function (t) {
              t || (this._isPaused = !1),
                this._interval &&
                  (clearInterval(this._interval), (this._interval = null)),
                this._config.interval &&
                  !this._isPaused &&
                  (this._interval = setInterval(
                    (document.visibilityState
                      ? this.nextWhenVisible
                      : this.next
                    ).bind(this),
                    this._config.interval
                  ));
            }),
            (t.to = function (t) {
              var e = this;
              this._activeElement = k(this._element).find(J.ACTIVE_ITEM)[0];
              var n = this._getItemIndex(this._activeElement);
              if (!(t > this._items.length - 1 || t < 0))
                if (this._isSliding)
                  k(this._element).one(K.SLID, function () {
                    return e.to(t);
                  });
                else {
                  if (n === t) return this.pause(), void this.cycle();
                  var i = n < t ? W : F;
                  this._slide(i, this._items[t]);
                }
            }),
            (t.dispose = function () {
              k(this._element).off(x),
                k.removeData(this._element, P),
                (this._items = null),
                (this._config = null),
                (this._element = null),
                (this._interval = null),
                (this._isPaused = null),
                (this._isSliding = null),
                (this._activeElement = null),
                (this._indicatorsElement = null);
            }),
            (t._getConfig = function (t) {
              return (t = c({}, R, t)), gt.typeCheckConfig(L, t, H), t;
            }),
            (t._addEventListeners = function () {
              var e = this;
              this._config.keyboard &&
                k(this._element).on(K.KEYDOWN, function (t) {
                  return e._keydown(t);
                }),
                "hover" === this._config.pause &&
                  (k(this._element)
                    .on(K.MOUSEENTER, function (t) {
                      return e.pause(t);
                    })
                    .on(K.MOUSELEAVE, function (t) {
                      return e.cycle(t);
                    }),
                  ("ontouchstart" in document.documentElement) &&
                    k(this._element).on(K.TOUCHEND, function () {
                      e.pause(),
                        e.touchTimeout && clearTimeout(e.touchTimeout),
                        (e.touchTimeout = setTimeout(function (t) {
                          return e.cycle(t);
                        }, 500 + e._config.interval));
                    }));
            }),
            (t._keydown = function (t) {
              if (!/input|textarea/i.test(t.target.tagName))
                switch (t.which) {
                  case 37:
                    t.preventDefault(), this.prev();
                    break;
                  case 39:
                    t.preventDefault(), this.next();
                }
            }),
            (t._getItemIndex = function (t) {
              return (
                (this._items = k.makeArray(k(t).parent().find(J.ITEM))),
                this._items.indexOf(t)
              );
            }),
            (t._getItemByDirection = function (t, e) {
              var n = t === W,
                i = t === F,
                r = this._getItemIndex(e),
                o = this._items.length - 1;
              if (((i && 0 === r) || (n && r === o)) && !this._config.wrap)
                return e;
              var s = (r + (t === F ? -1 : 1)) % this._items.length;
              return -1 === s
                ? this._items[this._items.length - 1]
                : this._items[s];
            }),
            (t._triggerSlideEvent = function (t, e) {
              var n = this._getItemIndex(t),
                i = this._getItemIndex(k(this._element).find(J.ACTIVE_ITEM)[0]),
                r = k.Event(K.SLIDE, {
                  relatedTarget: t,
                  direction: e,
                  from: i,
                  to: n,
                });
              return k(this._element).trigger(r), r;
            }),
            (t._setActiveIndicatorElement = function (t) {
              if (this._indicatorsElement) {
                k(this._indicatorsElement).find(J.ACTIVE).removeClass(Q);
                var e = this._indicatorsElement.children[this._getItemIndex(t)];
                e && k(e).addClass(Q);
              }
            }),
            (t._slide = function (t, e) {
              var n,
                i,
                r,
                o = this,
                s = k(this._element).find(J.ACTIVE_ITEM)[0],
                a = this._getItemIndex(s),
                l = e || (s && this._getItemByDirection(t, s)),
                c = this._getItemIndex(l),
                f = Boolean(this._interval);
              if (
                (t === W
                  ? ((n = q), (i = z), (r = U))
                  : ((n = G), (i = X), (r = B)),
                l && k(l).hasClass(Q))
              )
                this._isSliding = !1;
              else if (
                !this._triggerSlideEvent(l, r).isDefaultPrevented() &&
                s &&
                l
              ) {
                (this._isSliding = !0),
                  f && this.pause(),
                  this._setActiveIndicatorElement(l);
                var h = k.Event(K.SLID, {
                  relatedTarget: l,
                  direction: r,
                  from: a,
                  to: c,
                });
                if (k(this._element).hasClass(Y)) {
                  k(l).addClass(i),
                    gt.reflow(l),
                    k(s).addClass(n),
                    k(l).addClass(n);
                  var u = gt.getTransitionDurationFromElement(s);
                  k(s)
                    .one(gt.TRANSITION_END, function () {
                      k(l)
                        .removeClass(n + " " + i)
                        .addClass(Q),
                        k(s).removeClass(Q + " " + i + " " + n),
                        (o._isSliding = !1),
                        setTimeout(function () {
                          return k(o._element).trigger(h);
                        }, 0);
                    })
                    .emulateTransitionEnd(u);
                } else
                  k(s).removeClass(Q),
                    k(l).addClass(Q),
                    (this._isSliding = !1),
                    k(this._element).trigger(h);
                f && this.cycle();
              }
            }),
            (o._jQueryInterface = function (i) {
              return this.each(function () {
                var t = k(this).data(P),
                  e = c({}, R, k(this).data());
                "object" == typeof i && (e = c({}, e, i));
                var n = "string" == typeof i ? i : e.slide;
                if (
                  (t || ((t = new o(this, e)), k(this).data(P, t)),
                  "number" == typeof i)
                )
                  t.to(i);
                else if ("string" == typeof n) {
                  if ("undefined" == typeof t[n])
                    throw new TypeError('No method named "' + n + '"');
                  t[n]();
                } else e.interval && (t.pause(), t.cycle());
              });
            }),
            (o._dataApiClickHandler = function (t) {
              var e = gt.getSelectorFromElement(this);
              if (e) {
                var n = k(e)[0];
                if (n && k(n).hasClass(V)) {
                  var i = c({}, k(n).data(), k(this).data()),
                    r = this.getAttribute("data-slide-to");
                  r && (i.interval = !1),
                    o._jQueryInterface.call(k(n), i),
                    r && k(n).data(P).to(r),
                    t.preventDefault();
                }
              }
            }),
            s(o, null, [
              {
                key: "VERSION",
                get: function () {
                  return "4.1.1";
                },
              },
              {
                key: "Default",
                get: function () {
                  return R;
                },
              },
            ]),
            o
          );
        })()),
        k(document).on(K.CLICK_DATA_API, J.DATA_SLIDE, Z._dataApiClickHandler),
        k(window).on(K.LOAD_DATA_API, function () {
          k(J.DATA_RIDE).each(function () {
            var t = k(this);
            Z._jQueryInterface.call(t, t.data());
          });
        }),
        (k.fn[L] = Z._jQueryInterface),
        (k.fn[L].Constructor = Z),
        (k.fn[L].noConflict = function () {
          return (k.fn[L] = M), Z._jQueryInterface;
        }),
        Z),
      Et =
        ((tt = "collapse"),
        (nt = "." + (et = "bs.collapse")),
        (it = ($ = e).fn[tt]),
        (rt = { toggle: !0, parent: "" }),
        (ot = { toggle: "boolean", parent: "(string|element)" }),
        (st = {
          SHOW: "show" + nt,
          SHOWN: "shown" + nt,
          HIDE: "hide" + nt,
          HIDDEN: "hidden" + nt,
          CLICK_DATA_API: "click" + nt + ".data-api",
        }),
        (at = "show"),
        (lt = "collapse"),
        (ct = "collapsing"),
        (ft = "collapsed"),
        (ht = "width"),
        (ut = "height"),
        (dt = {
          ACTIVES: ".show, .collapsing",
          DATA_TOGGLE: '[data-toggle="collapse"]',
        }),
        (pt = (function () {
          function a(t, e) {
            (this._isTransitioning = !1),
              (this._element = t),
              (this._config = this._getConfig(e)),
              (this._triggerArray = $.makeArray(
                $(
                  '[data-toggle="collapse"][href="#' +
                    t.id +
                    '"],[data-toggle="collapse"][data-target="#' +
                    t.id +
                    '"]'
                )
              ));
            for (var n = $(dt.DATA_TOGGLE), i = 0; i < n.length; i++) {
              var r = n[i],
                o = gt.getSelectorFromElement(r);
              null !== o &&
                0 < $(o).filter(t).length &&
                ((this._selector = o), this._triggerArray.push(r));
            }
            (this._parent = this._config.parent ? this._getParent() : null),
              this._config.parent ||
                this._addAriaAndCollapsedClass(
                  this._element,
                  this._triggerArray
                ),
              this._config.toggle && this.toggle();
          }
          var t = a.prototype;
          return (
            (t.toggle = function () {
              $(this._element).hasClass(at) ? this.hide() : this.show();
            }),
            (t.show = function () {
              var t,
                e,
                n = this;
              if (
                !this._isTransitioning &&
                !$(this._element).hasClass(at) &&
                (this._parent &&
                  0 ===
                    (t = $.makeArray(
                      $(this._parent)
                        .find(dt.ACTIVES)
                        .filter('[data-parent="' + this._config.parent + '"]')
                    )).length &&
                  (t = null),
                !(
                  t &&
                  (e = $(t).not(this._selector).data(et)) &&
                  e._isTransitioning
                ))
              ) {
                var i = $.Event(st.SHOW);
                if (($(this._element).trigger(i), !i.isDefaultPrevented())) {
                  t &&
                    (a._jQueryInterface.call($(t).not(this._selector), "hide"),
                    e || $(t).data(et, null));
                  var r = this._getDimension();
                  $(this._element).removeClass(lt).addClass(ct),
                    (this._element.style[r] = 0) < this._triggerArray.length &&
                      $(this._triggerArray)
                        .removeClass(ft)
                        .attr("aria-expanded", !0),
                    this.setTransitioning(!0);
                  var o = "scroll" + (r[0].toUpperCase() + r.slice(1)),
                    s = gt.getTransitionDurationFromElement(this._element);
                  $(this._element)
                    .one(gt.TRANSITION_END, function () {
                      $(n._element).removeClass(ct).addClass(lt).addClass(at),
                        (n._element.style[r] = ""),
                        n.setTransitioning(!1),
                        $(n._element).trigger(st.SHOWN);
                    })
                    .emulateTransitionEnd(s),
                    (this._element.style[r] = this._element[o] + "px");
                }
              }
            }),
            (t.hide = function () {
              var t = this;
              if (!this._isTransitioning && $(this._element).hasClass(at)) {
                var e = $.Event(st.HIDE);
                if (($(this._element).trigger(e), !e.isDefaultPrevented())) {
                  var n = this._getDimension();
                  if (
                    ((this._element.style[n] =
                      this._element.getBoundingClientRect()[n] + "px"),
                    gt.reflow(this._element),
                    $(this._element)
                      .addClass(ct)
                      .removeClass(lt)
                      .removeClass(at),
                    0 < this._triggerArray.length)
                  )
                    for (var i = 0; i < this._triggerArray.length; i++) {
                      var r = this._triggerArray[i],
                        o = gt.getSelectorFromElement(r);
                      if (null !== o)
                        $(o).hasClass(at) ||
                          $(r).addClass(ft).attr("aria-expanded", !1);
                    }
                  this.setTransitioning(!0);
                  this._element.style[n] = "";
                  var s = gt.getTransitionDurationFromElement(this._element);
                  $(this._element)
                    .one(gt.TRANSITION_END, function () {
                      t.setTransitioning(!1),
                        $(t._element)
                          .removeClass(ct)
                          .addClass(lt)
                          .trigger(st.HIDDEN);
                    })
                    .emulateTransitionEnd(s);
                }
              }
            }),
            (t.setTransitioning = function (t) {
              this._isTransitioning = t;
            }),
            (t.dispose = function () {
              $.removeData(this._element, et),
                (this._config = null),
                (this._parent = null),
                (this._element = null),
                (this._triggerArray = null),
                (this._isTransitioning = null);
            }),
            (t._getConfig = function (t) {
              return (
                ((t = c({}, rt, t)).toggle = Boolean(t.toggle)),
                gt.typeCheckConfig(tt, t, ot),
                t
              );
            }),
            (t._getDimension = function () {
              return $(this._element).hasClass(ht) ? ht : ut;
            }),
            (t._getParent = function () {
              var n = this,
                t = null;
              gt.isElement(this._config.parent)
                ? ((t = this._config.parent),
                  "undefined" != typeof this._config.parent.jquery &&
                    (t = this._config.parent[0]))
                : (t = $(this._config.parent)[0]);
              var e =
                '[data-toggle="collapse"][data-parent="' +
                this._config.parent +
                '"]';
              return (
                $(t)
                  .find(e)
                  .each(function (t, e) {
                    n._addAriaAndCollapsedClass(a._getTargetFromElement(e), [
                      e,
                    ]);
                  }),
                t
              );
            }),
            (t._addAriaAndCollapsedClass = function (t, e) {
              if (t) {
                var n = $(t).hasClass(at);
                0 < e.length &&
                  $(e).toggleClass(ft, !n).attr("aria-expanded", n);
              }
            }),
            (a._getTargetFromElement = function (t) {
              var e = gt.getSelectorFromElement(t);
              return e ? $(e)[0] : null;
            }),
            (a._jQueryInterface = function (i) {
              return this.each(function () {
                var t = $(this),
                  e = t.data(et),
                  n = c({}, rt, t.data(), "object" == typeof i && i ? i : {});
                if (
                  (!e && n.toggle && /show|hide/.test(i) && (n.toggle = !1),
                  e || ((e = new a(this, n)), t.data(et, e)),
                  "string" == typeof i)
                ) {
                  if ("undefined" == typeof e[i])
                    throw new TypeError('No method named "' + i + '"');
                  e[i]();
                }
              });
            }),
            s(a, null, [
              {
                key: "VERSION",
                get: function () {
                  return "4.1.1";
                },
              },
              {
                key: "Default",
                get: function () {
                  return rt;
                },
              },
            ]),
            a
          );
        })()),
        $(document).on(st.CLICK_DATA_API, dt.DATA_TOGGLE, function (t) {
          "A" === t.currentTarget.tagName && t.preventDefault();
          var n = $(this),
            e = gt.getSelectorFromElement(this);
          $(e).each(function () {
            var t = $(this),
              e = t.data(et) ? "toggle" : n.data();
            pt._jQueryInterface.call(t, e);
          });
        }),
        ($.fn[tt] = pt._jQueryInterface),
        ($.fn[tt].Constructor = pt),
        ($.fn[tt].noConflict = function () {
          return ($.fn[tt] = it), pt._jQueryInterface;
        }),
        pt),
      yt = "undefined" != typeof window && "undefined" != typeof document,
      bt = ["Edge", "Trident", "Firefox"],
      Tt = 0,
      Ct = 0;
    Ct < bt.length;
    Ct += 1
  )
    if (yt && 0 <= navigator.userAgent.indexOf(bt[Ct])) {
      Tt = 1;
      break;
    }
  var wt =
    yt && window.Promise
      ? function (t) {
          var e = !1;
          return function () {
            e ||
              ((e = !0),
              window.Promise.resolve().then(function () {
                (e = !1), t();
              }));
          };
        }
      : function (t) {
          var e = !1;
          return function () {
            e ||
              ((e = !0),
              setTimeout(function () {
                (e = !1), t();
              }, Tt));
          };
        };
  function It(t) {
    return t && "[object Function]" === {}.toString.call(t);
  }
  function Dt(t, e) {
    if (1 !== t.nodeType) return [];
    var n = getComputedStyle(t, null);
    return e ? n[e] : n;
  }
  function At(t) {
    return "HTML" === t.nodeName ? t : t.parentNode || t.host;
  }
  function St(t) {
    if (!t) return document.body;
    switch (t.nodeName) {
      case "HTML":
      case "BODY":
        return t.ownerDocument.body;
      case "#document":
        return t.body;
    }
    var e = Dt(t),
      n = e.overflow,
      i = e.overflowX,
      r = e.overflowY;
    return /(auto|scroll|overlay)/.test(n + r + i) ? t : St(At(t));
  }
  var Ot = yt && !(!window.MSInputMethodContext || !document.documentMode),
    Nt = yt && /MSIE 10/.test(navigator.userAgent);
  function kt(t) {
    return 11 === t ? Ot : 10 === t ? Nt : Ot || Nt;
  }
  function Lt(t) {
    if (!t) return document.documentElement;
    for (
      var e = kt(10) ? document.body : null, n = t.offsetParent;
      n === e && t.nextElementSibling;

    )
      n = (t = t.nextElementSibling).offsetParent;
    var i = n && n.nodeName;
    return i && "BODY" !== i && "HTML" !== i
      ? -1 !== ["TD", "TABLE"].indexOf(n.nodeName) &&
        "static" === Dt(n, "position")
        ? Lt(n)
        : n
      : t
      ? t.ownerDocument.documentElement
      : document.documentElement;
  }
  function Pt(t) {
    return null !== t.parentNode ? Pt(t.parentNode) : t;
  }
  function xt(t, e) {
    if (!(t && t.nodeType && e && e.nodeType)) return document.documentElement;
    var n = t.compareDocumentPosition(e) & Node.DOCUMENT_POSITION_FOLLOWING,
      i = n ? t : e,
      r = n ? e : t,
      o = document.createRange();
    o.setStart(i, 0), o.setEnd(r, 0);
    var s,
      a,
      l = o.commonAncestorContainer;
    if ((t !== l && e !== l) || i.contains(r))
      return "BODY" === (a = (s = l).nodeName) ||
        ("HTML" !== a && Lt(s.firstElementChild) !== s)
        ? Lt(l)
        : l;
    var c = Pt(t);
    return c.host ? xt(c.host, e) : xt(t, Pt(e).host);
  }
  function jt(t) {
    var e =
        "top" ===
        (1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top")
          ? "scrollTop"
          : "scrollLeft",
      n = t.nodeName;
    if ("BODY" === n || "HTML" === n) {
      var i = t.ownerDocument.documentElement;
      return (t.ownerDocument.scrollingElement || i)[e];
    }
    return t[e];
  }
  function Mt(t, e) {
    var n = "x" === e ? "Left" : "Top",
      i = "Left" === n ? "Right" : "Bottom";
    return (
      parseFloat(t["border" + n + "Width"], 10) +
      parseFloat(t["border" + i + "Width"], 10)
    );
  }
  function Rt(t, e, n, i) {
    return Math.max(
      e["offset" + t],
      e["scroll" + t],
      n["client" + t],
      n["offset" + t],
      n["scroll" + t],
      kt(10)
        ? n["offset" + t] +
            i["margin" + ("Height" === t ? "Top" : "Left")] +
            i["margin" + ("Height" === t ? "Bottom" : "Right")]
        : 0
    );
  }
  function Ht() {
    var t = document.body,
      e = document.documentElement,
      n = kt(10) && getComputedStyle(e);
    return { height: Rt("Height", t, e, n), width: Rt("Width", t, e, n) };
  }
  var Wt = function (t, e) {
      if (!(t instanceof e))
        throw new TypeError("Cannot call a class as a function");
    },
    Ft = (function () {
      function i(t, e) {
        for (var n = 0; n < e.length; n++) {
          var i = e[n];
          (i.enumerable = i.enumerable || !1),
            (i.configurable = !0),
            "value" in i && (i.writable = !0),
            Object.defineProperty(t, i.key, i);
        }
      }
      return function (t, e, n) {
        return e && i(t.prototype, e), n && i(t, n), t;
      };
    })(),
    Ut = function (t, e, n) {
      return (
        e in t
          ? Object.defineProperty(t, e, {
              value: n,
              enumerable: !0,
              configurable: !0,
              writable: !0,
            })
          : (t[e] = n),
        t
      );
    },
    Bt =
      Object.assign ||
      function (t) {
        for (var e = 1; e < arguments.length; e++) {
          var n = arguments[e];
          for (var i in n)
            Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
        }
        return t;
      };
  function Kt(t) {
    return Bt({}, t, { right: t.left + t.width, bottom: t.top + t.height });
  }
  function Vt(t) {
    var e = {};
    try {
      if (kt(10)) {
        e = t.getBoundingClientRect();
        var n = jt(t, "top"),
          i = jt(t, "left");
        (e.top += n), (e.left += i), (e.bottom += n), (e.right += i);
      } else e = t.getBoundingClientRect();
    } catch (t) {}
    var r = {
        left: e.left,
        top: e.top,
        width: e.right - e.left,
        height: e.bottom - e.top,
      },
      o = "HTML" === t.nodeName ? Ht() : {},
      s = o.width || t.clientWidth || r.right - r.left,
      a = o.height || t.clientHeight || r.bottom - r.top,
      l = t.offsetWidth - s,
      c = t.offsetHeight - a;
    if (l || c) {
      var f = Dt(t);
      (l -= Mt(f, "x")), (c -= Mt(f, "y")), (r.width -= l), (r.height -= c);
    }
    return Kt(r);
  }
  function Qt(t, e) {
    var n = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
      i = kt(10),
      r = "HTML" === e.nodeName,
      o = Vt(t),
      s = Vt(e),
      a = St(t),
      l = Dt(e),
      c = parseFloat(l.borderTopWidth, 10),
      f = parseFloat(l.borderLeftWidth, 10);
    n &&
      "HTML" === e.nodeName &&
      ((s.top = Math.max(s.top, 0)), (s.left = Math.max(s.left, 0)));
    var h = Kt({
      top: o.top - s.top - c,
      left: o.left - s.left - f,
      width: o.width,
      height: o.height,
    });
    if (((h.marginTop = 0), (h.marginLeft = 0), !i && r)) {
      var u = parseFloat(l.marginTop, 10),
        d = parseFloat(l.marginLeft, 10);
      (h.top -= c - u),
        (h.bottom -= c - u),
        (h.left -= f - d),
        (h.right -= f - d),
        (h.marginTop = u),
        (h.marginLeft = d);
    }
    return (
      (i && !n ? e.contains(a) : e === a && "BODY" !== a.nodeName) &&
        (h = (function (t, e) {
          var n =
              2 < arguments.length && void 0 !== arguments[2] && arguments[2],
            i = jt(e, "top"),
            r = jt(e, "left"),
            o = n ? -1 : 1;
          return (
            (t.top += i * o),
            (t.bottom += i * o),
            (t.left += r * o),
            (t.right += r * o),
            t
          );
        })(h, e)),
      h
    );
  }
  function Yt(t) {
    if (!t || !t.parentElement || kt()) return document.documentElement;
    for (var e = t.parentElement; e && "none" === Dt(e, "transform"); )
      e = e.parentElement;
    return e || document.documentElement;
  }
  function Gt(t, e, n, i) {
    var r = 4 < arguments.length && void 0 !== arguments[4] && arguments[4],
      o = { top: 0, left: 0 },
      s = r ? Yt(t) : xt(t, e);
    if ("viewport" === i)
      o = (function (t) {
        var e = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
          n = t.ownerDocument.documentElement,
          i = Qt(t, n),
          r = Math.max(n.clientWidth, window.innerWidth || 0),
          o = Math.max(n.clientHeight, window.innerHeight || 0),
          s = e ? 0 : jt(n),
          a = e ? 0 : jt(n, "left");
        return Kt({
          top: s - i.top + i.marginTop,
          left: a - i.left + i.marginLeft,
          width: r,
          height: o,
        });
      })(s, r);
    else {
      var a = void 0;
      "scrollParent" === i
        ? "BODY" === (a = St(At(e))).nodeName &&
          (a = t.ownerDocument.documentElement)
        : (a = "window" === i ? t.ownerDocument.documentElement : i);
      var l = Qt(a, s, r);
      if (
        "HTML" !== a.nodeName ||
        (function t(e) {
          var n = e.nodeName;
          return (
            "BODY" !== n &&
            "HTML" !== n &&
            ("fixed" === Dt(e, "position") || t(At(e)))
          );
        })(s)
      )
        o = l;
      else {
        var c = Ht(),
          f = c.height,
          h = c.width;
        (o.top += l.top - l.marginTop),
          (o.bottom = f + l.top),
          (o.left += l.left - l.marginLeft),
          (o.right = h + l.left);
      }
    }
    return (o.left += n), (o.top += n), (o.right -= n), (o.bottom -= n), o;
  }
  function qt(t, e, i, n, r) {
    var o = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
    if (-1 === t.indexOf("auto")) return t;
    var s = Gt(i, n, o, r),
      a = {
        top: { width: s.width, height: e.top - s.top },
        right: { width: s.right - e.right, height: s.height },
        bottom: { width: s.width, height: s.bottom - e.bottom },
        left: { width: e.left - s.left, height: s.height },
      },
      l = Object.keys(a)
        .map(function (t) {
          return Bt({ key: t }, a[t], {
            area: ((e = a[t]), e.width * e.height),
          });
          var e;
        })
        .sort(function (t, e) {
          return e.area - t.area;
        }),
      c = l.filter(function (t) {
        var e = t.width,
          n = t.height;
        return e >= i.clientWidth && n >= i.clientHeight;
      }),
      f = 0 < c.length ? c[0].key : l[0].key,
      h = t.split("-")[1];
    return f + (h ? "-" + h : "");
  }
  function zt(t, e, n) {
    var i =
      3 < arguments.length && void 0 !== arguments[3] ? arguments[3] : null;
    return Qt(n, i ? Yt(e) : xt(e, n), i);
  }
  function Xt(t) {
    var e = getComputedStyle(t),
      n = parseFloat(e.marginTop) + parseFloat(e.marginBottom),
      i = parseFloat(e.marginLeft) + parseFloat(e.marginRight);
    return { width: t.offsetWidth + i, height: t.offsetHeight + n };
  }
  function Jt(t) {
    var e = { left: "right", right: "left", bottom: "top", top: "bottom" };
    return t.replace(/left|right|bottom|top/g, function (t) {
      return e[t];
    });
  }
  function Zt(t, e, n) {
    n = n.split("-")[0];
    var i = Xt(t),
      r = { width: i.width, height: i.height },
      o = -1 !== ["right", "left"].indexOf(n),
      s = o ? "top" : "left",
      a = o ? "left" : "top",
      l = o ? "height" : "width",
      c = o ? "width" : "height";
    return (
      (r[s] = e[s] + e[l] / 2 - i[l] / 2),
      (r[a] = n === a ? e[a] - i[c] : e[Jt(a)]),
      r
    );
  }
  function $t(t, e) {
    return Array.prototype.find ? t.find(e) : t.filter(e)[0];
  }
  function te(t, n, e) {
    return (
      (void 0 === e
        ? t
        : t.slice(
            0,
            (function (t, e, n) {
              if (Array.prototype.findIndex)
                return t.findIndex(function (t) {
                  return t[e] === n;
                });
              var i = $t(t, function (t) {
                return t[e] === n;
              });
              return t.indexOf(i);
            })(t, "name", e)
          )
      ).forEach(function (t) {
        t.function &&
          console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
        var e = t.function || t.fn;
        t.enabled &&
          It(e) &&
          ((n.offsets.popper = Kt(n.offsets.popper)),
          (n.offsets.reference = Kt(n.offsets.reference)),
          (n = e(n, t)));
      }),
      n
    );
  }
  function ee(t, n) {
    return t.some(function (t) {
      var e = t.name;
      return t.enabled && e === n;
    });
  }
  function ne(t) {
    for (
      var e = [!1, "ms", "Webkit", "Moz", "O"],
        n = t.charAt(0).toUpperCase() + t.slice(1),
        i = 0;
      i < e.length;
      i++
    ) {
      var r = e[i],
        o = r ? "" + r + n : t;
      if ("undefined" != typeof document.body.style[o]) return o;
    }
    return null;
  }
  function ie(t) {
    var e = t.ownerDocument;
    return e ? e.defaultView : window;
  }
  function re(t, e, n, i) {
    (n.updateBound = i),
      ie(t).addEventListener("resize", n.updateBound, { passive: !0 });
    var r = St(t);
    return (
      (function t(e, n, i, r) {
        var o = "BODY" === e.nodeName,
          s = o ? e.ownerDocument.defaultView : e;
        s.addEventListener(n, i, { passive: !0 }),
          o || t(St(s.parentNode), n, i, r),
          r.push(s);
      })(r, "scroll", n.updateBound, n.scrollParents),
      (n.scrollElement = r),
      (n.eventsEnabled = !0),
      n
    );
  }
  function oe() {
    var t, e;
    this.state.eventsEnabled &&
      (cancelAnimationFrame(this.scheduleUpdate),
      (this.state =
        ((t = this.reference),
        (e = this.state),
        ie(t).removeEventListener("resize", e.updateBound),
        e.scrollParents.forEach(function (t) {
          t.removeEventListener("scroll", e.updateBound);
        }),
        (e.updateBound = null),
        (e.scrollParents = []),
        (e.scrollElement = null),
        (e.eventsEnabled = !1),
        e)));
  }
  function se(t) {
    return "" !== t && !isNaN(parseFloat(t)) && isFinite(t);
  }
  function ae(n, i) {
    Object.keys(i).forEach(function (t) {
      var e = "";
      -1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(t) &&
        se(i[t]) &&
        (e = "px"),
        (n.style[t] = i[t] + e);
    });
  }
  function le(t, e, n) {
    var i = $t(t, function (t) {
        return t.name === e;
      }),
      r =
        !!i &&
        t.some(function (t) {
          return t.name === n && t.enabled && t.order < i.order;
        });
    if (!r) {
      var o = "`" + e + "`",
        s = "`" + n + "`";
      console.warn(
        s +
          " modifier is required by " +
          o +
          " modifier in order to work, be sure to include it before " +
          o +
          "!"
      );
    }
    return r;
  }
  var ce = [
      "auto-start",
      "auto",
      "auto-end",
      "top-start",
      "top",
      "top-end",
      "right-start",
      "right",
      "right-end",
      "bottom-end",
      "bottom",
      "bottom-start",
      "left-end",
      "left",
      "left-start",
    ],
    fe = ce.slice(3);
  function he(t) {
    var e = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
      n = fe.indexOf(t),
      i = fe.slice(n + 1).concat(fe.slice(0, n));
    return e ? i.reverse() : i;
  }
  var ue = {
    FLIP: "flip",
    CLOCKWISE: "clockwise",
    COUNTERCLOCKWISE: "counterclockwise",
  };
  function de(t, r, o, e) {
    var s = [0, 0],
      a = -1 !== ["right", "left"].indexOf(e),
      n = t.split(/(\+|\-)/).map(function (t) {
        return t.trim();
      }),
      i = n.indexOf(
        $t(n, function (t) {
          return -1 !== t.search(/,|\s/);
        })
      );
    n[i] &&
      -1 === n[i].indexOf(",") &&
      console.warn(
        "Offsets separated by white space(s) are deprecated, use a comma (,) instead."
      );
    var l = /\s*,\s*|\s+/,
      c =
        -1 !== i
          ? [
              n.slice(0, i).concat([n[i].split(l)[0]]),
              [n[i].split(l)[1]].concat(n.slice(i + 1)),
            ]
          : [n];
    return (
      (c = c.map(function (t, e) {
        var n = (1 === e ? !a : a) ? "height" : "width",
          i = !1;
        return t
          .reduce(function (t, e) {
            return "" === t[t.length - 1] && -1 !== ["+", "-"].indexOf(e)
              ? ((t[t.length - 1] = e), (i = !0), t)
              : i
              ? ((t[t.length - 1] += e), (i = !1), t)
              : t.concat(e);
          }, [])
          .map(function (t) {
            return (function (t, e, n, i) {
              var r = t.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                o = +r[1],
                s = r[2];
              if (!o) return t;
              if (0 === s.indexOf("%")) {
                var a = void 0;
                switch (s) {
                  case "%p":
                    a = n;
                    break;
                  case "%":
                  case "%r":
                  default:
                    a = i;
                }
                return (Kt(a)[e] / 100) * o;
              }
              if ("vh" === s || "vw" === s)
                return (
                  (("vh" === s
                    ? Math.max(
                        document.documentElement.clientHeight,
                        window.innerHeight || 0
                      )
                    : Math.max(
                        document.documentElement.clientWidth,
                        window.innerWidth || 0
                      )) /
                    100) *
                  o
                );
              return o;
            })(t, n, r, o);
          });
      })).forEach(function (n, i) {
        n.forEach(function (t, e) {
          se(t) && (s[i] += t * ("-" === n[e - 1] ? -1 : 1));
        });
      }),
      s
    );
  }
  var pe = {
      placement: "bottom",
      positionFixed: !1,
      eventsEnabled: !0,
      removeOnDestroy: !1,
      onCreate: function () {},
      onUpdate: function () {},
      modifiers: {
        shift: {
          order: 100,
          enabled: !0,
          fn: function (t) {
            var e = t.placement,
              n = e.split("-")[0],
              i = e.split("-")[1];
            if (i) {
              var r = t.offsets,
                o = r.reference,
                s = r.popper,
                a = -1 !== ["bottom", "top"].indexOf(n),
                l = a ? "left" : "top",
                c = a ? "width" : "height",
                f = {
                  start: Ut({}, l, o[l]),
                  end: Ut({}, l, o[l] + o[c] - s[c]),
                };
              t.offsets.popper = Bt({}, s, f[i]);
            }
            return t;
          },
        },
        offset: {
          order: 200,
          enabled: !0,
          fn: function (t, e) {
            var n = e.offset,
              i = t.placement,
              r = t.offsets,
              o = r.popper,
              s = r.reference,
              a = i.split("-")[0],
              l = void 0;
            return (
              (l = se(+n) ? [+n, 0] : de(n, o, s, a)),
              "left" === a
                ? ((o.top += l[0]), (o.left -= l[1]))
                : "right" === a
                ? ((o.top += l[0]), (o.left += l[1]))
                : "top" === a
                ? ((o.left += l[0]), (o.top -= l[1]))
                : "bottom" === a && ((o.left += l[0]), (o.top += l[1])),
              (t.popper = o),
              t
            );
          },
          offset: 0,
        },
        preventOverflow: {
          order: 300,
          enabled: !0,
          fn: function (t, i) {
            var e = i.boundariesElement || Lt(t.instance.popper);
            t.instance.reference === e && (e = Lt(e));
            var n = ne("transform"),
              r = t.instance.popper.style,
              o = r.top,
              s = r.left,
              a = r[n];
            (r.top = ""), (r.left = ""), (r[n] = "");
            var l = Gt(
              t.instance.popper,
              t.instance.reference,
              i.padding,
              e,
              t.positionFixed
            );
            (r.top = o), (r.left = s), (r[n] = a), (i.boundaries = l);
            var c = i.priority,
              f = t.offsets.popper,
              h = {
                primary: function (t) {
                  var e = f[t];
                  return (
                    f[t] < l[t] &&
                      !i.escapeWithReference &&
                      (e = Math.max(f[t], l[t])),
                    Ut({}, t, e)
                  );
                },
                secondary: function (t) {
                  var e = "right" === t ? "left" : "top",
                    n = f[e];
                  return (
                    f[t] > l[t] &&
                      !i.escapeWithReference &&
                      (n = Math.min(
                        f[e],
                        l[t] - ("right" === t ? f.width : f.height)
                      )),
                    Ut({}, e, n)
                  );
                },
              };
            return (
              c.forEach(function (t) {
                var e =
                  -1 !== ["left", "top"].indexOf(t) ? "primary" : "secondary";
                f = Bt({}, f, h[e](t));
              }),
              (t.offsets.popper = f),
              t
            );
          },
          priority: ["left", "right", "top", "bottom"],
          padding: 5,
          boundariesElement: "scrollParent",
        },
        keepTogether: {
          order: 400,
          enabled: !0,
          fn: function (t) {
            var e = t.offsets,
              n = e.popper,
              i = e.reference,
              r = t.placement.split("-")[0],
              o = Math.floor,
              s = -1 !== ["top", "bottom"].indexOf(r),
              a = s ? "right" : "bottom",
              l = s ? "left" : "top",
              c = s ? "width" : "height";
            return (
              n[a] < o(i[l]) && (t.offsets.popper[l] = o(i[l]) - n[c]),
              n[l] > o(i[a]) && (t.offsets.popper[l] = o(i[a])),
              t
            );
          },
        },
        arrow: {
          order: 500,
          enabled: !0,
          fn: function (t, e) {
            var n;
            if (!le(t.instance.modifiers, "arrow", "keepTogether")) return t;
            var i = e.element;
            if ("string" == typeof i) {
              if (!(i = t.instance.popper.querySelector(i))) return t;
            } else if (!t.instance.popper.contains(i))
              return (
                console.warn(
                  "WARNING: `arrow.element` must be child of its popper element!"
                ),
                t
              );
            var r = t.placement.split("-")[0],
              o = t.offsets,
              s = o.popper,
              a = o.reference,
              l = -1 !== ["left", "right"].indexOf(r),
              c = l ? "height" : "width",
              f = l ? "Top" : "Left",
              h = f.toLowerCase(),
              u = l ? "left" : "top",
              d = l ? "bottom" : "right",
              p = Xt(i)[c];
            a[d] - p < s[h] && (t.offsets.popper[h] -= s[h] - (a[d] - p)),
              a[h] + p > s[d] && (t.offsets.popper[h] += a[h] + p - s[d]),
              (t.offsets.popper = Kt(t.offsets.popper));
            var g = a[h] + a[c] / 2 - p / 2,
              m = Dt(t.instance.popper),
              _ = parseFloat(m["margin" + f], 10),
              v = parseFloat(m["border" + f + "Width"], 10),
              E = g - t.offsets.popper[h] - _ - v;
            return (
              (E = Math.max(Math.min(s[c] - p, E), 0)),
              (t.arrowElement = i),
              (t.offsets.arrow =
                (Ut((n = {}), h, Math.round(E)), Ut(n, u, ""), n)),
              t
            );
          },
          element: "[x-arrow]",
        },
        flip: {
          order: 600,
          enabled: !0,
          fn: function (p, g) {
            if (ee(p.instance.modifiers, "inner")) return p;
            if (p.flipped && p.placement === p.originalPlacement) return p;
            var m = Gt(
                p.instance.popper,
                p.instance.reference,
                g.padding,
                g.boundariesElement,
                p.positionFixed
              ),
              _ = p.placement.split("-")[0],
              v = Jt(_),
              E = p.placement.split("-")[1] || "",
              y = [];
            switch (g.behavior) {
              case ue.FLIP:
                y = [_, v];
                break;
              case ue.CLOCKWISE:
                y = he(_);
                break;
              case ue.COUNTERCLOCKWISE:
                y = he(_, !0);
                break;
              default:
                y = g.behavior;
            }
            return (
              y.forEach(function (t, e) {
                if (_ !== t || y.length === e + 1) return p;
                (_ = p.placement.split("-")[0]), (v = Jt(_));
                var n,
                  i = p.offsets.popper,
                  r = p.offsets.reference,
                  o = Math.floor,
                  s =
                    ("left" === _ && o(i.right) > o(r.left)) ||
                    ("right" === _ && o(i.left) < o(r.right)) ||
                    ("top" === _ && o(i.bottom) > o(r.top)) ||
                    ("bottom" === _ && o(i.top) < o(r.bottom)),
                  a = o(i.left) < o(m.left),
                  l = o(i.right) > o(m.right),
                  c = o(i.top) < o(m.top),
                  f = o(i.bottom) > o(m.bottom),
                  h =
                    ("left" === _ && a) ||
                    ("right" === _ && l) ||
                    ("top" === _ && c) ||
                    ("bottom" === _ && f),
                  u = -1 !== ["top", "bottom"].indexOf(_),
                  d =
                    !!g.flipVariations &&
                    ((u && "start" === E && a) ||
                      (u && "end" === E && l) ||
                      (!u && "start" === E && c) ||
                      (!u && "end" === E && f));
                (s || h || d) &&
                  ((p.flipped = !0),
                  (s || h) && (_ = y[e + 1]),
                  d &&
                    (E =
                      "end" === (n = E) ? "start" : "start" === n ? "end" : n),
                  (p.placement = _ + (E ? "-" + E : "")),
                  (p.offsets.popper = Bt(
                    {},
                    p.offsets.popper,
                    Zt(p.instance.popper, p.offsets.reference, p.placement)
                  )),
                  (p = te(p.instance.modifiers, p, "flip")));
              }),
              p
            );
          },
          behavior: "flip",
          padding: 5,
          boundariesElement: "viewport",
        },
        inner: {
          order: 700,
          enabled: !1,
          fn: function (t) {
            var e = t.placement,
              n = e.split("-")[0],
              i = t.offsets,
              r = i.popper,
              o = i.reference,
              s = -1 !== ["left", "right"].indexOf(n),
              a = -1 === ["top", "left"].indexOf(n);
            return (
              (r[s ? "left" : "top"] =
                o[n] - (a ? r[s ? "width" : "height"] : 0)),
              (t.placement = Jt(e)),
              (t.offsets.popper = Kt(r)),
              t
            );
          },
        },
        hide: {
          order: 800,
          enabled: !0,
          fn: function (t) {
            if (!le(t.instance.modifiers, "hide", "preventOverflow")) return t;
            var e = t.offsets.reference,
              n = $t(t.instance.modifiers, function (t) {
                return "preventOverflow" === t.name;
              }).boundaries;
            if (
              e.bottom < n.top ||
              e.left > n.right ||
              e.top > n.bottom ||
              e.right < n.left
            ) {
              if (!0 === t.hide) return t;
              (t.hide = !0), (t.attributes["x-out-of-boundaries"] = "");
            } else {
              if (!1 === t.hide) return t;
              (t.hide = !1), (t.attributes["x-out-of-boundaries"] = !1);
            }
            return t;
          },
        },
        computeStyle: {
          order: 850,
          enabled: !0,
          fn: function (t, e) {
            var n = e.x,
              i = e.y,
              r = t.offsets.popper,
              o = $t(t.instance.modifiers, function (t) {
                return "applyStyle" === t.name;
              }).gpuAcceleration;
            void 0 !== o &&
              console.warn(
                "WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!"
              );
            var s = void 0 !== o ? o : e.gpuAcceleration,
              a = Vt(Lt(t.instance.popper)),
              l = { position: r.position },
              c = {
                left: Math.floor(r.left),
                top: Math.round(r.top),
                bottom: Math.round(r.bottom),
                right: Math.floor(r.right),
              },
              f = "bottom" === n ? "top" : "bottom",
              h = "right" === i ? "left" : "right",
              u = ne("transform"),
              d = void 0,
              p = void 0;
            if (
              ((p = "bottom" === f ? -a.height + c.bottom : c.top),
              (d = "right" === h ? -a.width + c.right : c.left),
              s && u)
            )
              (l[u] = "translate3d(" + d + "px, " + p + "px, 0)"),
                (l[f] = 0),
                (l[h] = 0),
                (l.willChange = "transform");
            else {
              var g = "bottom" === f ? -1 : 1,
                m = "right" === h ? -1 : 1;
              (l[f] = p * g), (l[h] = d * m), (l.willChange = f + ", " + h);
            }
            var _ = { "x-placement": t.placement };
            return (
              (t.attributes = Bt({}, _, t.attributes)),
              (t.styles = Bt({}, l, t.styles)),
              (t.arrowStyles = Bt({}, t.offsets.arrow, t.arrowStyles)),
              t
            );
          },
          gpuAcceleration: !0,
          x: "bottom",
          y: "right",
        },
        applyStyle: {
          order: 900,
          enabled: !0,
          fn: function (t) {
            var e, n;
            return (
              ae(t.instance.popper, t.styles),
              (e = t.instance.popper),
              (n = t.attributes),
              Object.keys(n).forEach(function (t) {
                !1 !== n[t] ? e.setAttribute(t, n[t]) : e.removeAttribute(t);
              }),
              t.arrowElement &&
                Object.keys(t.arrowStyles).length &&
                ae(t.arrowElement, t.arrowStyles),
              t
            );
          },
          onLoad: function (t, e, n, i, r) {
            var o = zt(r, e, t, n.positionFixed),
              s = qt(
                n.placement,
                o,
                e,
                t,
                n.modifiers.flip.boundariesElement,
                n.modifiers.flip.padding
              );
            return (
              e.setAttribute("x-placement", s),
              ae(e, { position: n.positionFixed ? "fixed" : "absolute" }),
              n
            );
          },
          gpuAcceleration: void 0,
        },
      },
    },
    ge = (function () {
      function o(t, e) {
        var n = this,
          i =
            2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
        Wt(this, o),
          (this.scheduleUpdate = function () {
            return requestAnimationFrame(n.update);
          }),
          (this.update = wt(this.update.bind(this))),
          (this.options = Bt({}, o.Defaults, i)),
          (this.state = { isDestroyed: !1, isCreated: !1, scrollParents: [] }),
          (this.reference = t && t.jquery ? t[0] : t),
          (this.popper = e && e.jquery ? e[0] : e),
          (this.options.modifiers = {}),
          Object.keys(Bt({}, o.Defaults.modifiers, i.modifiers)).forEach(
            function (t) {
              n.options.modifiers[t] = Bt(
                {},
                o.Defaults.modifiers[t] || {},
                i.modifiers ? i.modifiers[t] : {}
              );
            }
          ),
          (this.modifiers = Object.keys(this.options.modifiers)
            .map(function (t) {
              return Bt({ name: t }, n.options.modifiers[t]);
            })
            .sort(function (t, e) {
              return t.order - e.order;
            })),
          this.modifiers.forEach(function (t) {
            t.enabled &&
              It(t.onLoad) &&
              t.onLoad(n.reference, n.popper, n.options, t, n.state);
          }),
          this.update();
        var r = this.options.eventsEnabled;
        r && this.enableEventListeners(), (this.state.eventsEnabled = r);
      }
      return (
        Ft(o, [
          {
            key: "update",
            value: function () {
              return function () {
                if (!this.state.isDestroyed) {
                  var t = {
                    instance: this,
                    styles: {},
                    arrowStyles: {},
                    attributes: {},
                    flipped: !1,
                    offsets: {},
                  };
                  (t.offsets.reference = zt(
                    this.state,
                    this.popper,
                    this.reference,
                    this.options.positionFixed
                  )),
                    (t.placement = qt(
                      this.options.placement,
                      t.offsets.reference,
                      this.popper,
                      this.reference,
                      this.options.modifiers.flip.boundariesElement,
                      this.options.modifiers.flip.padding
                    )),
                    (t.originalPlacement = t.placement),
                    (t.positionFixed = this.options.positionFixed),
                    (t.offsets.popper = Zt(
                      this.popper,
                      t.offsets.reference,
                      t.placement
                    )),
                    (t.offsets.popper.position = this.options.positionFixed
                      ? "fixed"
                      : "absolute"),
                    (t = te(this.modifiers, t)),
                    this.state.isCreated
                      ? this.options.onUpdate(t)
                      : ((this.state.isCreated = !0), this.options.onCreate(t));
                }
              }.call(this);
            },
          },
          {
            key: "destroy",
            value: function () {
              return function () {
                return (
                  (this.state.isDestroyed = !0),
                  ee(this.modifiers, "applyStyle") &&
                    (this.popper.removeAttribute("x-placement"),
                    (this.popper.style.position = ""),
                    (this.popper.style.top = ""),
                    (this.popper.style.left = ""),
                    (this.popper.style.right = ""),
                    (this.popper.style.bottom = ""),
                    (this.popper.style.willChange = ""),
                    (this.popper.style[ne("transform")] = "")),
                  this.disableEventListeners(),
                  this.options.removeOnDestroy &&
                    this.popper.parentNode.removeChild(this.popper),
                  this
                );
              }.call(this);
            },
          },
          {
            key: "enableEventListeners",
            value: function () {
              return function () {
                this.state.eventsEnabled ||
                  (this.state = re(
                    this.reference,
                    this.options,
                    this.state,
                    this.scheduleUpdate
                  ));
              }.call(this);
            },
          },
          {
            key: "disableEventListeners",
            value: function () {
              return oe.call(this);
            },
          },
        ]),
        o
      );
    })();
  (ge.Utils = ("undefined" != typeof window ? window : global).PopperUtils),
    (ge.placements = ce),
    (ge.Defaults = pe);
  var me,
    _e,
    ve,
    Ee,
    ye,
    be,
    Te,
    Ce,
    we,
    Ie,
    De,
    Ae,
    Se,
    Oe,
    Ne,
    ke,
    Le,
    Pe,
    xe,
    je,
    Me,
    Re,
    He,
    We,
    Fe,
    Ue,
    Be,
    Ke,
    Ve,
    Qe,
    Ye,
    Ge,
    qe,
    ze,
    Xe,
    Je,
    Ze,
    $e,
    tn,
    en,
    nn,
    rn,
    on,
    sn,
    an,
    ln,
    cn,
    fn,
    hn,
    un,
    dn,
    pn,
    gn,
    mn,
    _n,
    vn,
    En,
    yn,
    bn,
    Tn,
    Cn,
    wn,
    In,
    Dn,
    An,
    Sn,
    On,
    Nn,
    kn,
    Ln,
    Pn,
    xn,
    jn,
    Mn,
    Rn,
    Hn,
    Wn,
    Fn,
    Un,
    Bn,
    Kn,
    Vn,
    Qn,
    Yn,
    Gn,
    qn,
    zn,
    Xn,
    Jn,
    Zn,
    $n,
    ti,
    ei,
    ni,
    ii,
    ri,
    oi,
    si,
    ai,
    li,
    ci,
    fi,
    hi,
    ui,
    di,
    pi,
    gi,
    mi,
    _i,
    vi,
    Ei,
    yi,
    bi,
    Ti =
      ((_e = "dropdown"),
      (Ee = "." + (ve = "bs.dropdown")),
      (ye = ".data-api"),
      (be = (me = e).fn[_e]),
      (Te = new RegExp("38|40|27")),
      (Ce = {
        HIDE: "hide" + Ee,
        HIDDEN: "hidden" + Ee,
        SHOW: "show" + Ee,
        SHOWN: "shown" + Ee,
        CLICK: "click" + Ee,
        CLICK_DATA_API: "click" + Ee + ye,
        KEYDOWN_DATA_API: "keydown" + Ee + ye,
        KEYUP_DATA_API: "keyup" + Ee + ye,
      }),
      (we = "disabled"),
      (Ie = "show"),
      (De = "dropup"),
      (Ae = "dropright"),
      (Se = "dropleft"),
      (Oe = "dropdown-menu-right"),
      (Ne = "position-static"),
      (ke = '[data-toggle="dropdown"]'),
      (Le = ".dropdown form"),
      (Pe = ".dropdown-menu"),
      (xe = ".navbar-nav"),
      (je = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)"),
      (Me = "top-start"),
      (Re = "top-end"),
      (He = "bottom-start"),
      (We = "bottom-end"),
      (Fe = "right-start"),
      (Ue = "left-start"),
      (Be = {
        offset: 0,
        flip: !0,
        boundary: "scrollParent",
        reference: "toggle",
        display: "dynamic",
      }),
      (Ke = {
        offset: "(number|string|function)",
        flip: "boolean",
        boundary: "(string|element)",
        reference: "(string|element)",
        display: "string",
      }),
      (Ve = (function () {
        function l(t, e) {
          (this._element = t),
            (this._popper = null),
            (this._config = this._getConfig(e)),
            (this._menu = this._getMenuElement()),
            (this._inNavbar = this._detectNavbar()),
            this._addEventListeners();
        }
        var t = l.prototype;
        return (
          (t.toggle = function () {
            if (!this._element.disabled && !me(this._element).hasClass(we)) {
              var t = l._getParentFromElement(this._element),
                e = me(this._menu).hasClass(Ie);
              if ((l._clearMenus(), !e)) {
                var n = { relatedTarget: this._element },
                  i = me.Event(Ce.SHOW, n);
                if ((me(t).trigger(i), !i.isDefaultPrevented())) {
                  if (!this._inNavbar) {
                    if ("undefined" == typeof ge)
                      throw new TypeError(
                        "Bootstrap dropdown require Popper.js (https://popper.js.org)"
                      );
                    var r = this._element;
                    "parent" === this._config.reference
                      ? (r = t)
                      : gt.isElement(this._config.reference) &&
                        ((r = this._config.reference),
                        "undefined" != typeof this._config.reference.jquery &&
                          (r = this._config.reference[0])),
                      "scrollParent" !== this._config.boundary &&
                        me(t).addClass(Ne),
                      (this._popper = new ge(
                        r,
                        this._menu,
                        this._getPopperConfig()
                      ));
                  }
                  "ontouchstart" in document.documentElement &&
                    0 === me(t).closest(xe).length &&
                    me(document.body).children().on("mouseover", null, me.noop),
                    this._element.focus(),
                    this._element.setAttribute("aria-expanded", !0),
                    me(this._menu).toggleClass(Ie),
                    me(t).toggleClass(Ie).trigger(me.Event(Ce.SHOWN, n));
                }
              }
            }
          }),
          (t.dispose = function () {
            me.removeData(this._element, ve),
              me(this._element).off(Ee),
              (this._element = null),
              (this._menu = null) !== this._popper &&
                (this._popper.destroy(), (this._popper = null));
          }),
          (t.update = function () {
            (this._inNavbar = this._detectNavbar()),
              null !== this._popper && this._popper.scheduleUpdate();
          }),
          (t._addEventListeners = function () {
            var e = this;
            me(this._element).on(Ce.CLICK, function (t) {
              t.preventDefault(), t.stopPropagation(), e.toggle();
            });
          }),
          (t._getConfig = function (t) {
            return (
              (t = c(
                {},
                this.constructor.Default,
                me(this._element).data(),
                t
              )),
              gt.typeCheckConfig(_e, t, this.constructor.DefaultType),
              t
            );
          }),
          (t._getMenuElement = function () {
            if (!this._menu) {
              var t = l._getParentFromElement(this._element);
              this._menu = me(t).find(Pe)[0];
            }
            return this._menu;
          }),
          (t._getPlacement = function () {
            var t = me(this._element).parent(),
              e = He;
            return (
              t.hasClass(De)
                ? ((e = Me), me(this._menu).hasClass(Oe) && (e = Re))
                : t.hasClass(Ae)
                ? (e = Fe)
                : t.hasClass(Se)
                ? (e = Ue)
                : me(this._menu).hasClass(Oe) && (e = We),
              e
            );
          }),
          (t._detectNavbar = function () {
            return 0 < me(this._element).closest(".navbar").length;
          }),
          (t._getPopperConfig = function () {
            var e = this,
              t = {};
            "function" == typeof this._config.offset
              ? (t.fn = function (t) {
                  return (
                    (t.offsets = c(
                      {},
                      t.offsets,
                      e._config.offset(t.offsets) || {}
                    )),
                    t
                  );
                })
              : (t.offset = this._config.offset);
            var n = {
              placement: this._getPlacement(),
              modifiers: {
                offset: t,
                flip: { enabled: this._config.flip },
                preventOverflow: { boundariesElement: this._config.boundary },
              },
            };
            return (
              "static" === this._config.display &&
                (n.modifiers.applyStyle = { enabled: !1 }),
              n
            );
          }),
          (l._jQueryInterface = function (e) {
            return this.each(function () {
              var t = me(this).data(ve);
              if (
                (t ||
                  ((t = new l(this, "object" == typeof e ? e : null)),
                  me(this).data(ve, t)),
                "string" == typeof e)
              ) {
                if ("undefined" == typeof t[e])
                  throw new TypeError('No method named "' + e + '"');
                t[e]();
              }
            });
          }),
          (l._clearMenus = function (t) {
            if (!t || (3 !== t.which && ("keyup" !== t.type || 9 === t.which)))
              for (var e = me.makeArray(me(ke)), n = 0; n < e.length; n++) {
                var i = l._getParentFromElement(e[n]),
                  r = me(e[n]).data(ve),
                  o = { relatedTarget: e[n] };
                if (r) {
                  var s = r._menu;
                  if (
                    me(i).hasClass(Ie) &&
                    !(
                      t &&
                      (("click" === t.type &&
                        /input|textarea/i.test(t.target.tagName)) ||
                        ("keyup" === t.type && 9 === t.which)) &&
                      me.contains(i, t.target)
                    )
                  ) {
                    var a = me.Event(Ce.HIDE, o);
                    me(i).trigger(a),
                      a.isDefaultPrevented() ||
                        ("ontouchstart" in document.documentElement &&
                          me(document.body)
                            .children()
                            .off("mouseover", null, me.noop),
                        e[n].setAttribute("aria-expanded", "false"),
                        me(s).removeClass(Ie),
                        me(i).removeClass(Ie).trigger(me.Event(Ce.HIDDEN, o)));
                  }
                }
              }
          }),
          (l._getParentFromElement = function (t) {
            var e,
              n = gt.getSelectorFromElement(t);
            return n && (e = me(n)[0]), e || t.parentNode;
          }),
          (l._dataApiKeydownHandler = function (t) {
            if (
              (/input|textarea/i.test(t.target.tagName)
                ? !(
                    32 === t.which ||
                    (27 !== t.which &&
                      ((40 !== t.which && 38 !== t.which) ||
                        me(t.target).closest(Pe).length))
                  )
                : Te.test(t.which)) &&
              (t.preventDefault(),
              t.stopPropagation(),
              !this.disabled && !me(this).hasClass(we))
            ) {
              var e = l._getParentFromElement(this),
                n = me(e).hasClass(Ie);
              if (
                (n || (27 === t.which && 32 === t.which)) &&
                (!n || (27 !== t.which && 32 !== t.which))
              ) {
                var i = me(e).find(je).get();
                if (0 !== i.length) {
                  var r = i.indexOf(t.target);
                  38 === t.which && 0 < r && r--,
                    40 === t.which && r < i.length - 1 && r++,
                    r < 0 && (r = 0),
                    i[r].focus();
                }
              } else {
                if (27 === t.which) {
                  var o = me(e).find(ke)[0];
                  me(o).trigger("focus");
                }
                me(this).trigger("click");
              }
            }
          }),
          s(l, null, [
            {
              key: "VERSION",
              get: function () {
                return "4.1.1";
              },
            },
            {
              key: "Default",
              get: function () {
                return Be;
              },
            },
            {
              key: "DefaultType",
              get: function () {
                return Ke;
              },
            },
          ]),
          l
        );
      })()),
      me(document)
        .on(Ce.KEYDOWN_DATA_API, ke, Ve._dataApiKeydownHandler)
        .on(Ce.KEYDOWN_DATA_API, Pe, Ve._dataApiKeydownHandler)
        .on(Ce.CLICK_DATA_API + " " + Ce.KEYUP_DATA_API, Ve._clearMenus)
        .on(Ce.CLICK_DATA_API, ke, function (t) {
          t.preventDefault(),
            t.stopPropagation(),
            Ve._jQueryInterface.call(me(this), "toggle");
        })
        .on(Ce.CLICK_DATA_API, Le, function (t) {
          t.stopPropagation();
        }),
      (me.fn[_e] = Ve._jQueryInterface),
      (me.fn[_e].Constructor = Ve),
      (me.fn[_e].noConflict = function () {
        return (me.fn[_e] = be), Ve._jQueryInterface;
      }),
      Ve),
    Ci =
      ((Ye = "modal"),
      (qe = "." + (Ge = "bs.modal")),
      (ze = (Qe = e).fn[Ye]),
      (Xe = { backdrop: !0, keyboard: !0, focus: !0, show: !0 }),
      (Je = {
        backdrop: "(boolean|string)",
        keyboard: "boolean",
        focus: "boolean",
        show: "boolean",
      }),
      (Ze = {
        HIDE: "hide" + qe,
        HIDDEN: "hidden" + qe,
        SHOW: "show" + qe,
        SHOWN: "shown" + qe,
        FOCUSIN: "focusin" + qe,
        RESIZE: "resize" + qe,
        CLICK_DISMISS: "click.dismiss" + qe,
        KEYDOWN_DISMISS: "keydown.dismiss" + qe,
        MOUSEUP_DISMISS: "mouseup.dismiss" + qe,
        MOUSEDOWN_DISMISS: "mousedown.dismiss" + qe,
        CLICK_DATA_API: "click" + qe + ".data-api",
      }),
      ($e = "modal-scrollbar-measure"),
      (tn = "modal-backdrop"),
      (en = "modal-open"),
      (nn = "fade"),
      (rn = "show"),
      (on = {
        DIALOG: ".modal-dialog",
        DATA_TOGGLE: '[data-toggle="modal"]',
        DATA_DISMISS: '[data-dismiss="modal"]',
        FIXED_CONTENT: ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
        STICKY_CONTENT: ".sticky-top",
        NAVBAR_TOGGLER: ".navbar-toggler",
      }),
      (sn = (function () {
        function r(t, e) {
          (this._config = this._getConfig(e)),
            (this._element = t),
            (this._dialog = Qe(t).find(on.DIALOG)[0]),
            (this._backdrop = null),
            (this._isShown = !1),
            (this._isBodyOverflowing = !1),
            (this._ignoreBackdropClick = !1),
            (this._scrollbarWidth = 0);
        }
        var t = r.prototype;
        return (
          (t.toggle = function (t) {
            return this._isShown ? this.hide() : this.show(t);
          }),
          (t.show = function (t) {
            var e = this;
            if (!this._isTransitioning && !this._isShown) {
              Qe(this._element).hasClass(nn) && (this._isTransitioning = !0);
              var n = Qe.Event(Ze.SHOW, { relatedTarget: t });
              Qe(this._element).trigger(n),
                this._isShown ||
                  n.isDefaultPrevented() ||
                  ((this._isShown = !0),
                  this._checkScrollbar(),
                  this._setScrollbar(),
                  this._adjustDialog(),
                  Qe(document.body).addClass(en),
                  this._setEscapeEvent(),
                  this._setResizeEvent(),
                  Qe(this._element).on(
                    Ze.CLICK_DISMISS,
                    on.DATA_DISMISS,
                    function (t) {
                      return e.hide(t);
                    }
                  ),
                  Qe(this._dialog).on(Ze.MOUSEDOWN_DISMISS, function () {
                    Qe(e._element).one(Ze.MOUSEUP_DISMISS, function (t) {
                      Qe(t.target).is(e._element) &&
                        (e._ignoreBackdropClick = !0);
                    });
                  }),
                  this._showBackdrop(function () {
                    return e._showElement(t);
                  }));
            }
          }),
          (t.hide = function (t) {
            var e = this;
            if (
              (t && t.preventDefault(), !this._isTransitioning && this._isShown)
            ) {
              var n = Qe.Event(Ze.HIDE);
              if (
                (Qe(this._element).trigger(n),
                this._isShown && !n.isDefaultPrevented())
              ) {
                this._isShown = !1;
                var i = Qe(this._element).hasClass(nn);
                if (
                  (i && (this._isTransitioning = !0),
                  this._setEscapeEvent(),
                  this._setResizeEvent(),
                  Qe(document).off(Ze.FOCUSIN),
                  Qe(this._element).removeClass(rn),
                  Qe(this._element).off(Ze.CLICK_DISMISS),
                  Qe(this._dialog).off(Ze.MOUSEDOWN_DISMISS),
                  i)
                ) {
                  var r = gt.getTransitionDurationFromElement(this._element);
                  Qe(this._element)
                    .one(gt.TRANSITION_END, function (t) {
                      return e._hideModal(t);
                    })
                    .emulateTransitionEnd(r);
                } else this._hideModal();
              }
            }
          }),
          (t.dispose = function () {
            Qe.removeData(this._element, Ge),
              Qe(window, document, this._element, this._backdrop).off(qe),
              (this._config = null),
              (this._element = null),
              (this._dialog = null),
              (this._backdrop = null),
              (this._isShown = null),
              (this._isBodyOverflowing = null),
              (this._ignoreBackdropClick = null),
              (this._scrollbarWidth = null);
          }),
          (t.handleUpdate = function () {
            this._adjustDialog();
          }),
          (t._getConfig = function (t) {
            return (t = c({}, Xe, t)), gt.typeCheckConfig(Ye, t, Je), t;
          }),
          (t._showElement = function (t) {
            var e = this,
              n = Qe(this._element).hasClass(nn);
            (this._element.parentNode &&
              this._element.parentNode.nodeType === Node.ELEMENT_NODE) ||
              document.body.appendChild(this._element),
              (this._element.style.display = "block"),
              this._element.removeAttribute("aria-hidden"),
              (this._element.scrollTop = 0),
              n && gt.reflow(this._element),
              Qe(this._element).addClass(rn),
              this._config.focus && this._enforceFocus();
            var i = Qe.Event(Ze.SHOWN, { relatedTarget: t }),
              r = function () {
                e._config.focus && e._element.focus(),
                  (e._isTransitioning = !1),
                  Qe(e._element).trigger(i);
              };
            if (n) {
              var o = gt.getTransitionDurationFromElement(this._element);
              Qe(this._dialog)
                .one(gt.TRANSITION_END, r)
                .emulateTransitionEnd(o);
            } else r();
          }),
          (t._enforceFocus = function () {
            var e = this;
            Qe(document)
              .off(Ze.FOCUSIN)
              .on(Ze.FOCUSIN, function (t) {
                document !== t.target &&
                  e._element !== t.target &&
                  0 === Qe(e._element).has(t.target).length &&
                  e._element.focus();
              });
          }),
          (t._setEscapeEvent = function () {
            var e = this;
            this._isShown && this._config.keyboard
              ? Qe(this._element).on(Ze.KEYDOWN_DISMISS, function (t) {
                  27 === t.which && (t.preventDefault(), e.hide());
                })
              : this._isShown || Qe(this._element).off(Ze.KEYDOWN_DISMISS);
          }),
          (t._setResizeEvent = function () {
            var e = this;
            this._isShown
              ? Qe(window).on(Ze.RESIZE, function (t) {
                  return e.handleUpdate(t);
                })
              : Qe(window).off(Ze.RESIZE);
          }),
          (t._hideModal = function () {
            var t = this;
            (this._element.style.display = "none"),
              this._element.setAttribute("aria-hidden", !0),
              (this._isTransitioning = !1),
              this._showBackdrop(function () {
                Qe(document.body).removeClass(en),
                  t._resetAdjustments(),
                  t._resetScrollbar(),
                  Qe(t._element).trigger(Ze.HIDDEN);
              });
          }),
          (t._removeBackdrop = function () {
            this._backdrop &&
              (Qe(this._backdrop).remove(), (this._backdrop = null));
          }),
          (t._showBackdrop = function (t) {
            var e = this,
              n = Qe(this._element).hasClass(nn) ? nn : "";
            if (this._isShown && this._config.backdrop) {
              if (
                ((this._backdrop = document.createElement("div")),
                (this._backdrop.className = tn),
                n && Qe(this._backdrop).addClass(n),
                Qe(this._backdrop).appendTo(document.body),
                Qe(this._element).on(Ze.CLICK_DISMISS, function (t) {
                  e._ignoreBackdropClick
                    ? (e._ignoreBackdropClick = !1)
                    : t.target === t.currentTarget &&
                      ("static" === e._config.backdrop
                        ? e._element.focus()
                        : e.hide());
                }),
                n && gt.reflow(this._backdrop),
                Qe(this._backdrop).addClass(rn),
                !t)
              )
                return;
              if (!n) return void t();
              var i = gt.getTransitionDurationFromElement(this._backdrop);
              Qe(this._backdrop)
                .one(gt.TRANSITION_END, t)
                .emulateTransitionEnd(i);
            } else if (!this._isShown && this._backdrop) {
              Qe(this._backdrop).removeClass(rn);
              var r = function () {
                e._removeBackdrop(), t && t();
              };
              if (Qe(this._element).hasClass(nn)) {
                var o = gt.getTransitionDurationFromElement(this._backdrop);
                Qe(this._backdrop)
                  .one(gt.TRANSITION_END, r)
                  .emulateTransitionEnd(o);
              } else r();
            } else t && t();
          }),
          (t._adjustDialog = function () {
            var t =
              this._element.scrollHeight >
              document.documentElement.clientHeight;
            !this._isBodyOverflowing &&
              t &&
              (this._element.style.paddingLeft = this._scrollbarWidth + "px"),
              this._isBodyOverflowing &&
                !t &&
                (this._element.style.paddingRight =
                  this._scrollbarWidth + "px");
          }),
          (t._resetAdjustments = function () {
            (this._element.style.paddingLeft = ""),
              (this._element.style.paddingRight = "");
          }),
          (t._checkScrollbar = function () {
            var t = document.body.getBoundingClientRect();
            (this._isBodyOverflowing = t.left + t.right < window.innerWidth),
              (this._scrollbarWidth = this._getScrollbarWidth());
          }),
          (t._setScrollbar = function () {
            var r = this;
            if (this._isBodyOverflowing) {
              Qe(on.FIXED_CONTENT).each(function (t, e) {
                var n = Qe(e)[0].style.paddingRight,
                  i = Qe(e).css("padding-right");
                Qe(e)
                  .data("padding-right", n)
                  .css(
                    "padding-right",
                    parseFloat(i) + r._scrollbarWidth + "px"
                  );
              }),
                Qe(on.STICKY_CONTENT).each(function (t, e) {
                  var n = Qe(e)[0].style.marginRight,
                    i = Qe(e).css("margin-right");
                  Qe(e)
                    .data("margin-right", n)
                    .css(
                      "margin-right",
                      parseFloat(i) - r._scrollbarWidth + "px"
                    );
                }),
                Qe(on.NAVBAR_TOGGLER).each(function (t, e) {
                  var n = Qe(e)[0].style.marginRight,
                    i = Qe(e).css("margin-right");
                  Qe(e)
                    .data("margin-right", n)
                    .css(
                      "margin-right",
                      parseFloat(i) + r._scrollbarWidth + "px"
                    );
                });
              var t = document.body.style.paddingRight,
                e = Qe(document.body).css("padding-right");
              Qe(document.body)
                .data("padding-right", t)
                .css(
                  "padding-right",
                  parseFloat(e) + this._scrollbarWidth + "px"
                );
            }
          }),
          (t._resetScrollbar = function () {
            Qe(on.FIXED_CONTENT).each(function (t, e) {
              var n = Qe(e).data("padding-right");
              "undefined" != typeof n &&
                Qe(e).css("padding-right", n).removeData("padding-right");
            }),
              Qe(on.STICKY_CONTENT + ", " + on.NAVBAR_TOGGLER).each(function (
                t,
                e
              ) {
                var n = Qe(e).data("margin-right");
                "undefined" != typeof n &&
                  Qe(e).css("margin-right", n).removeData("margin-right");
              });
            var t = Qe(document.body).data("padding-right");
            "undefined" != typeof t &&
              Qe(document.body)
                .css("padding-right", t)
                .removeData("padding-right");
          }),
          (t._getScrollbarWidth = function () {
            var t = document.createElement("div");
            (t.className = $e), document.body.appendChild(t);
            var e = t.getBoundingClientRect().width - t.clientWidth;
            return document.body.removeChild(t), e;
          }),
          (r._jQueryInterface = function (n, i) {
            return this.each(function () {
              var t = Qe(this).data(Ge),
                e = c(
                  {},
                  Xe,
                  Qe(this).data(),
                  "object" == typeof n && n ? n : {}
                );
              if (
                (t || ((t = new r(this, e)), Qe(this).data(Ge, t)),
                "string" == typeof n)
              ) {
                if ("undefined" == typeof t[n])
                  throw new TypeError('No method named "' + n + '"');
                t[n](i);
              } else e.show && t.show(i);
            });
          }),
          s(r, null, [
            {
              key: "VERSION",
              get: function () {
                return "4.1.1";
              },
            },
            {
              key: "Default",
              get: function () {
                return Xe;
              },
            },
          ]),
          r
        );
      })()),
      Qe(document).on(Ze.CLICK_DATA_API, on.DATA_TOGGLE, function (t) {
        var e,
          n = this,
          i = gt.getSelectorFromElement(this);
        i && (e = Qe(i)[0]);
        var r = Qe(e).data(Ge)
          ? "toggle"
          : c({}, Qe(e).data(), Qe(this).data());
        ("A" !== this.tagName && "AREA" !== this.tagName) || t.preventDefault();
        var o = Qe(e).one(Ze.SHOW, function (t) {
          t.isDefaultPrevented() ||
            o.one(Ze.HIDDEN, function () {
              Qe(n).is(":visible") && n.focus();
            });
        });
        sn._jQueryInterface.call(Qe(e), r, this);
      }),
      (Qe.fn[Ye] = sn._jQueryInterface),
      (Qe.fn[Ye].Constructor = sn),
      (Qe.fn[Ye].noConflict = function () {
        return (Qe.fn[Ye] = ze), sn._jQueryInterface;
      }),
      sn),
    wi =
      ((ln = "tooltip"),
      (fn = "." + (cn = "bs.tooltip")),
      (hn = (an = e).fn[ln]),
      (un = "bs-tooltip"),
      (dn = new RegExp("(^|\\s)" + un + "\\S+", "g")),
      (mn = {
        animation: !0,
        template:
          '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !(gn = {
          AUTO: "auto",
          TOP: "top",
          RIGHT: "right",
          BOTTOM: "bottom",
          LEFT: "left",
        }),
        selector: !(pn = {
          animation: "boolean",
          template: "string",
          title: "(string|element|function)",
          trigger: "string",
          delay: "(number|object)",
          html: "boolean",
          selector: "(string|boolean)",
          placement: "(string|function)",
          offset: "(number|string)",
          container: "(string|element|boolean)",
          fallbackPlacement: "(string|array)",
          boundary: "(string|element)",
        }),
        placement: "top",
        offset: 0,
        container: !1,
        fallbackPlacement: "flip",
        boundary: "scrollParent",
      }),
      (vn = "out"),
      (En = {
        HIDE: "hide" + fn,
        HIDDEN: "hidden" + fn,
        SHOW: (_n = "show") + fn,
        SHOWN: "shown" + fn,
        INSERTED: "inserted" + fn,
        CLICK: "click" + fn,
        FOCUSIN: "focusin" + fn,
        FOCUSOUT: "focusout" + fn,
        MOUSEENTER: "mouseenter" + fn,
        MOUSELEAVE: "mouseleave" + fn,
      }),
      (yn = "fade"),
      (bn = "show"),
      (Tn = ".tooltip-inner"),
      (Cn = ".arrow"),
      (wn = "hover"),
      (In = "focus"),
      (Dn = "click"),
      (An = "manual"),
      (Sn = (function () {
        function i(t, e) {
          if ("undefined" == typeof ge)
            throw new TypeError(
              "Bootstrap tooltips require Popper.js (https://popper.js.org)"
            );
          (this._isEnabled = !0),
            (this._timeout = 0),
            (this._hoverState = ""),
            (this._activeTrigger = {}),
            (this._popper = null),
            (this.element = t),
            (this.config = this._getConfig(e)),
            (this.tip = null),
            this._setListeners();
        }
        var t = i.prototype;
        return (
          (t.enable = function () {
            this._isEnabled = !0;
          }),
          (t.disable = function () {
            this._isEnabled = !1;
          }),
          (t.toggleEnabled = function () {
            this._isEnabled = !this._isEnabled;
          }),
          (t.toggle = function (t) {
            if (this._isEnabled)
              if (t) {
                var e = this.constructor.DATA_KEY,
                  n = an(t.currentTarget).data(e);
                n ||
                  ((n = new this.constructor(
                    t.currentTarget,
                    this._getDelegateConfig()
                  )),
                  an(t.currentTarget).data(e, n)),
                  (n._activeTrigger.click = !n._activeTrigger.click),
                  n._isWithActiveTrigger()
                    ? n._enter(null, n)
                    : n._leave(null, n);
              } else {
                if (an(this.getTipElement()).hasClass(bn))
                  return void this._leave(null, this);
                this._enter(null, this);
              }
          }),
          (t.dispose = function () {
            clearTimeout(this._timeout),
              an.removeData(this.element, this.constructor.DATA_KEY),
              an(this.element).off(this.constructor.EVENT_KEY),
              an(this.element).closest(".modal").off("hide.bs.modal"),
              this.tip && an(this.tip).remove(),
              (this._isEnabled = null),
              (this._timeout = null),
              (this._hoverState = null),
              (this._activeTrigger = null) !== this._popper &&
                this._popper.destroy(),
              (this._popper = null),
              (this.element = null),
              (this.config = null),
              (this.tip = null);
          }),
          (t.show = function () {
            var e = this;
            if ("none" === an(this.element).css("display"))
              throw new Error("Please use show on visible elements");
            var t = an.Event(this.constructor.Event.SHOW);
            if (this.isWithContent() && this._isEnabled) {
              an(this.element).trigger(t);
              var n = an.contains(
                this.element.ownerDocument.documentElement,
                this.element
              );
              if (t.isDefaultPrevented() || !n) return;
              var i = this.getTipElement(),
                r = gt.getUID(this.constructor.NAME);
              i.setAttribute("id", r),
                this.element.setAttribute("aria-describedby", r),
                this.setContent(),
                this.config.animation && an(i).addClass(yn);
              var o =
                  "function" == typeof this.config.placement
                    ? this.config.placement.call(this, i, this.element)
                    : this.config.placement,
                s = this._getAttachment(o);
              this.addAttachmentClass(s);
              var a =
                !1 === this.config.container
                  ? document.body
                  : an(this.config.container);
              an(i).data(this.constructor.DATA_KEY, this),
                an.contains(
                  this.element.ownerDocument.documentElement,
                  this.tip
                ) || an(i).appendTo(a),
                an(this.element).trigger(this.constructor.Event.INSERTED),
                (this._popper = new ge(this.element, i, {
                  placement: s,
                  modifiers: {
                    offset: { offset: this.config.offset },
                    flip: { behavior: this.config.fallbackPlacement },
                    arrow: { element: Cn },
                    preventOverflow: {
                      boundariesElement: this.config.boundary,
                    },
                  },
                  onCreate: function (t) {
                    t.originalPlacement !== t.placement &&
                      e._handlePopperPlacementChange(t);
                  },
                  onUpdate: function (t) {
                    e._handlePopperPlacementChange(t);
                  },
                })),
                an(i).addClass(bn),
                "ontouchstart" in document.documentElement &&
                  an(document.body).children().on("mouseover", null, an.noop);
              var l = function () {
                e.config.animation && e._fixTransition();
                var t = e._hoverState;
                (e._hoverState = null),
                  an(e.element).trigger(e.constructor.Event.SHOWN),
                  t === vn && e._leave(null, e);
              };
              if (an(this.tip).hasClass(yn)) {
                var c = gt.getTransitionDurationFromElement(this.tip);
                an(this.tip).one(gt.TRANSITION_END, l).emulateTransitionEnd(c);
              } else l();
            }
          }),
          (t.hide = function (t) {
            var e = this,
              n = this.getTipElement(),
              i = an.Event(this.constructor.Event.HIDE),
              r = function () {
                e._hoverState !== _n &&
                  n.parentNode &&
                  n.parentNode.removeChild(n),
                  e._cleanTipClass(),
                  e.element.removeAttribute("aria-describedby"),
                  an(e.element).trigger(e.constructor.Event.HIDDEN),
                  null !== e._popper && e._popper.destroy(),
                  t && t();
              };
            if ((an(this.element).trigger(i), !i.isDefaultPrevented())) {
              if (
                (an(n).removeClass(bn),
                "ontouchstart" in document.documentElement &&
                  an(document.body).children().off("mouseover", null, an.noop),
                (this._activeTrigger[Dn] = !1),
                (this._activeTrigger[In] = !1),
                (this._activeTrigger[wn] = !1),
                an(this.tip).hasClass(yn))
              ) {
                var o = gt.getTransitionDurationFromElement(n);
                an(n).one(gt.TRANSITION_END, r).emulateTransitionEnd(o);
              } else r();
              this._hoverState = "";
            }
          }),
          (t.update = function () {
            null !== this._popper && this._popper.scheduleUpdate();
          }),
          (t.isWithContent = function () {
            return Boolean(this.getTitle());
          }),
          (t.addAttachmentClass = function (t) {
            an(this.getTipElement()).addClass(un + "-" + t);
          }),
          (t.getTipElement = function () {
            return (
              (this.tip = this.tip || an(this.config.template)[0]), this.tip
            );
          }),
          (t.setContent = function () {
            var t = an(this.getTipElement());
            this.setElementContent(t.find(Tn), this.getTitle()),
              t.removeClass(yn + " " + bn);
          }),
          (t.setElementContent = function (t, e) {
            var n = this.config.html;
            "object" == typeof e && (e.nodeType || e.jquery)
              ? n
                ? an(e).parent().is(t) || t.empty().append(e)
                : t.text(an(e).text())
              : t[n ? "html" : "text"](e);
          }),
          (t.getTitle = function () {
            var t = this.element.getAttribute("data-original-title");
            return (
              t ||
                (t =
                  "function" == typeof this.config.title
                    ? this.config.title.call(this.element)
                    : this.config.title),
              t
            );
          }),
          (t._getAttachment = function (t) {
            return gn[t.toUpperCase()];
          }),
          (t._setListeners = function () {
            var i = this;
            this.config.trigger.split(" ").forEach(function (t) {
              if ("click" === t)
                an(i.element).on(
                  i.constructor.Event.CLICK,
                  i.config.selector,
                  function (t) {
                    return i.toggle(t);
                  }
                );
              else if (t !== An) {
                var e =
                    t === wn
                      ? i.constructor.Event.MOUSEENTER
                      : i.constructor.Event.FOCUSIN,
                  n =
                    t === wn
                      ? i.constructor.Event.MOUSELEAVE
                      : i.constructor.Event.FOCUSOUT;
                an(i.element)
                  .on(e, i.config.selector, function (t) {
                    return i._enter(t);
                  })
                  .on(n, i.config.selector, function (t) {
                    return i._leave(t);
                  });
              }
              an(i.element)
                .closest(".modal")
                .on("hide.bs.modal", function () {
                  return i.hide();
                });
            }),
              this.config.selector
                ? (this.config = c({}, this.config, {
                    trigger: "manual",
                    selector: "",
                  }))
                : this._fixTitle();
          }),
          (t._fixTitle = function () {
            var t = typeof this.element.getAttribute("data-original-title");
            (this.element.getAttribute("title") || "string" !== t) &&
              (this.element.setAttribute(
                "data-original-title",
                this.element.getAttribute("title") || ""
              ),
              this.element.setAttribute("title", ""));
          }),
          (t._enter = function (t, e) {
            var n = this.constructor.DATA_KEY;
            (e = e || an(t.currentTarget).data(n)) ||
              ((e = new this.constructor(
                t.currentTarget,
                this._getDelegateConfig()
              )),
              an(t.currentTarget).data(n, e)),
              t && (e._activeTrigger["focusin" === t.type ? In : wn] = !0),
              an(e.getTipElement()).hasClass(bn) || e._hoverState === _n
                ? (e._hoverState = _n)
                : (clearTimeout(e._timeout),
                  (e._hoverState = _n),
                  e.config.delay && e.config.delay.show
                    ? (e._timeout = setTimeout(function () {
                        e._hoverState === _n && e.show();
                      }, e.config.delay.show))
                    : e.show());
          }),
          (t._leave = function (t, e) {
            var n = this.constructor.DATA_KEY;
            (e = e || an(t.currentTarget).data(n)) ||
              ((e = new this.constructor(
                t.currentTarget,
                this._getDelegateConfig()
              )),
              an(t.currentTarget).data(n, e)),
              t && (e._activeTrigger["focusout" === t.type ? In : wn] = !1),
              e._isWithActiveTrigger() ||
                (clearTimeout(e._timeout),
                (e._hoverState = vn),
                e.config.delay && e.config.delay.hide
                  ? (e._timeout = setTimeout(function () {
                      e._hoverState === vn && e.hide();
                    }, e.config.delay.hide))
                  : e.hide());
          }),
          (t._isWithActiveTrigger = function () {
            for (var t in this._activeTrigger)
              if (this._activeTrigger[t]) return !0;
            return !1;
          }),
          (t._getConfig = function (t) {
            return (
              "number" ==
                typeof (t = c(
                  {},
                  this.constructor.Default,
                  an(this.element).data(),
                  "object" == typeof t && t ? t : {}
                )).delay && (t.delay = { show: t.delay, hide: t.delay }),
              "number" == typeof t.title && (t.title = t.title.toString()),
              "number" == typeof t.content &&
                (t.content = t.content.toString()),
              gt.typeCheckConfig(ln, t, this.constructor.DefaultType),
              t
            );
          }),
          (t._getDelegateConfig = function () {
            var t = {};
            if (this.config)
              for (var e in this.config)
                this.constructor.Default[e] !== this.config[e] &&
                  (t[e] = this.config[e]);
            return t;
          }),
          (t._cleanTipClass = function () {
            var t = an(this.getTipElement()),
              e = t.attr("class").match(dn);
            null !== e && 0 < e.length && t.removeClass(e.join(""));
          }),
          (t._handlePopperPlacementChange = function (t) {
            this._cleanTipClass(),
              this.addAttachmentClass(this._getAttachment(t.placement));
          }),
          (t._fixTransition = function () {
            var t = this.getTipElement(),
              e = this.config.animation;
            null === t.getAttribute("x-placement") &&
              (an(t).removeClass(yn),
              (this.config.animation = !1),
              this.hide(),
              this.show(),
              (this.config.animation = e));
          }),
          (i._jQueryInterface = function (n) {
            return this.each(function () {
              var t = an(this).data(cn),
                e = "object" == typeof n && n;
              if (
                (t || !/dispose|hide/.test(n)) &&
                (t || ((t = new i(this, e)), an(this).data(cn, t)),
                "string" == typeof n)
              ) {
                if ("undefined" == typeof t[n])
                  throw new TypeError('No method named "' + n + '"');
                t[n]();
              }
            });
          }),
          s(i, null, [
            {
              key: "VERSION",
              get: function () {
                return "4.1.1";
              },
            },
            {
              key: "Default",
              get: function () {
                return mn;
              },
            },
            {
              key: "NAME",
              get: function () {
                return ln;
              },
            },
            {
              key: "DATA_KEY",
              get: function () {
                return cn;
              },
            },
            {
              key: "Event",
              get: function () {
                return En;
              },
            },
            {
              key: "EVENT_KEY",
              get: function () {
                return fn;
              },
            },
            {
              key: "DefaultType",
              get: function () {
                return pn;
              },
            },
          ]),
          i
        );
      })()),
      (an.fn[ln] = Sn._jQueryInterface),
      (an.fn[ln].Constructor = Sn),
      (an.fn[ln].noConflict = function () {
        return (an.fn[ln] = hn), Sn._jQueryInterface;
      }),
      Sn),
    Ii =
      ((Nn = "popover"),
      (Ln = "." + (kn = "bs.popover")),
      (Pn = (On = e).fn[Nn]),
      (xn = "bs-popover"),
      (jn = new RegExp("(^|\\s)" + xn + "\\S+", "g")),
      (Mn = c({}, wi.Default, {
        placement: "right",
        trigger: "click",
        content: "",
        template:
          '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
      })),
      (Rn = c({}, wi.DefaultType, { content: "(string|element|function)" })),
      (Hn = "fade"),
      (Fn = ".popover-header"),
      (Un = ".popover-body"),
      (Bn = {
        HIDE: "hide" + Ln,
        HIDDEN: "hidden" + Ln,
        SHOW: (Wn = "show") + Ln,
        SHOWN: "shown" + Ln,
        INSERTED: "inserted" + Ln,
        CLICK: "click" + Ln,
        FOCUSIN: "focusin" + Ln,
        FOCUSOUT: "focusout" + Ln,
        MOUSEENTER: "mouseenter" + Ln,
        MOUSELEAVE: "mouseleave" + Ln,
      }),
      (Kn = (function (t) {
        var e, n;
        function i() {
          return t.apply(this, arguments) || this;
        }
        (n = t),
          ((e = i).prototype = Object.create(n.prototype)),
          ((e.prototype.constructor = e).__proto__ = n);
        var r = i.prototype;
        return (
          (r.isWithContent = function () {
            return this.getTitle() || this._getContent();
          }),
          (r.addAttachmentClass = function (t) {
            On(this.getTipElement()).addClass(xn + "-" + t);
          }),
          (r.getTipElement = function () {
            return (
              (this.tip = this.tip || On(this.config.template)[0]), this.tip
            );
          }),
          (r.setContent = function () {
            var t = On(this.getTipElement());
            this.setElementContent(t.find(Fn), this.getTitle());
            var e = this._getContent();
            "function" == typeof e && (e = e.call(this.element)),
              this.setElementContent(t.find(Un), e),
              t.removeClass(Hn + " " + Wn);
          }),
          (r._getContent = function () {
            return (
              this.element.getAttribute("data-content") || this.config.content
            );
          }),
          (r._cleanTipClass = function () {
            var t = On(this.getTipElement()),
              e = t.attr("class").match(jn);
            null !== e && 0 < e.length && t.removeClass(e.join(""));
          }),
          (i._jQueryInterface = function (n) {
            return this.each(function () {
              var t = On(this).data(kn),
                e = "object" == typeof n ? n : null;
              if (
                (t || !/destroy|hide/.test(n)) &&
                (t || ((t = new i(this, e)), On(this).data(kn, t)),
                "string" == typeof n)
              ) {
                if ("undefined" == typeof t[n])
                  throw new TypeError('No method named "' + n + '"');
                t[n]();
              }
            });
          }),
          s(i, null, [
            {
              key: "VERSION",
              get: function () {
                return "4.1.1";
              },
            },
            {
              key: "Default",
              get: function () {
                return Mn;
              },
            },
            {
              key: "NAME",
              get: function () {
                return Nn;
              },
            },
            {
              key: "DATA_KEY",
              get: function () {
                return kn;
              },
            },
            {
              key: "Event",
              get: function () {
                return Bn;
              },
            },
            {
              key: "EVENT_KEY",
              get: function () {
                return Ln;
              },
            },
            {
              key: "DefaultType",
              get: function () {
                return Rn;
              },
            },
          ]),
          i
        );
      })(wi)),
      (On.fn[Nn] = Kn._jQueryInterface),
      (On.fn[Nn].Constructor = Kn),
      (On.fn[Nn].noConflict = function () {
        return (On.fn[Nn] = Pn), Kn._jQueryInterface;
      }),
      Kn),
    Di =
      ((Qn = "scrollspy"),
      (Gn = "." + (Yn = "bs.scrollspy")),
      (qn = (Vn = e).fn[Qn]),
      (zn = { offset: 10, method: "auto", target: "" }),
      (Xn = { offset: "number", method: "string", target: "(string|element)" }),
      (Jn = {
        ACTIVATE: "activate" + Gn,
        SCROLL: "scroll" + Gn,
        LOAD_DATA_API: "load" + Gn + ".data-api",
      }),
      (Zn = "dropdown-item"),
      ($n = "active"),
      (ti = {
        DATA_SPY: '[data-spy="scroll"]',
        ACTIVE: ".active",
        NAV_LIST_GROUP: ".nav, .list-group",
        NAV_LINKS: ".nav-link",
        NAV_ITEMS: ".nav-item",
        LIST_ITEMS: ".list-group-item",
        DROPDOWN: ".dropdown",
        DROPDOWN_ITEMS: ".dropdown-item",
        DROPDOWN_TOGGLE: ".dropdown-toggle",
      }),
      (ei = "offset"),
      (ni = "position"),
      (ii = (function () {
        function n(t, e) {
          var n = this;
          (this._element = t),
            (this._scrollElement = "BODY" === t.tagName ? window : t),
            (this._config = this._getConfig(e)),
            (this._selector =
              this._config.target +
              " " +
              ti.NAV_LINKS +
              "," +
              this._config.target +
              " " +
              ti.LIST_ITEMS +
              "," +
              this._config.target +
              " " +
              ti.DROPDOWN_ITEMS),
            (this._offsets = []),
            (this._targets = []),
            (this._activeTarget = null),
            (this._scrollHeight = 0),
            Vn(this._scrollElement).on(Jn.SCROLL, function (t) {
              return n._process(t);
            }),
            this.refresh(),
            this._process();
        }
        var t = n.prototype;
        return (
          (t.refresh = function () {
            var e = this,
              t = this._scrollElement === this._scrollElement.window ? ei : ni,
              r = "auto" === this._config.method ? t : this._config.method,
              o = r === ni ? this._getScrollTop() : 0;
            (this._offsets = []),
              (this._targets = []),
              (this._scrollHeight = this._getScrollHeight()),
              Vn.makeArray(Vn(this._selector))
                .map(function (t) {
                  var e,
                    n = gt.getSelectorFromElement(t);
                  if ((n && (e = Vn(n)[0]), e)) {
                    var i = e.getBoundingClientRect();
                    if (i.width || i.height) return [Vn(e)[r]().top + o, n];
                  }
                  return null;
                })
                .filter(function (t) {
                  return t;
                })
                .sort(function (t, e) {
                  return t[0] - e[0];
                })
                .forEach(function (t) {
                  e._offsets.push(t[0]), e._targets.push(t[1]);
                });
          }),
          (t.dispose = function () {
            Vn.removeData(this._element, Yn),
              Vn(this._scrollElement).off(Gn),
              (this._element = null),
              (this._scrollElement = null),
              (this._config = null),
              (this._selector = null),
              (this._offsets = null),
              (this._targets = null),
              (this._activeTarget = null),
              (this._scrollHeight = null);
          }),
          (t._getConfig = function (t) {
            if (
              "string" !=
              typeof (t = c({}, zn, "object" == typeof t && t ? t : {})).target
            ) {
              var e = Vn(t.target).attr("id");
              e || ((e = gt.getUID(Qn)), Vn(t.target).attr("id", e)),
                (t.target = "#" + e);
            }
            return gt.typeCheckConfig(Qn, t, Xn), t;
          }),
          (t._getScrollTop = function () {
            return this._scrollElement === window
              ? this._scrollElement.pageYOffset
              : this._scrollElement.scrollTop;
          }),
          (t._getScrollHeight = function () {
            return (
              this._scrollElement.scrollHeight ||
              Math.max(
                document.body.scrollHeight,
                document.documentElement.scrollHeight
              )
            );
          }),
          (t._getOffsetHeight = function () {
            return this._scrollElement === window
              ? window.innerHeight
              : this._scrollElement.getBoundingClientRect().height;
          }),
          (t._process = function () {
            var t = this._getScrollTop() + this._config.offset,
              e = this._getScrollHeight(),
              n = this._config.offset + e - this._getOffsetHeight();
            if ((this._scrollHeight !== e && this.refresh(), n <= t)) {
              var i = this._targets[this._targets.length - 1];
              this._activeTarget !== i && this._activate(i);
            } else {
              if (
                this._activeTarget &&
                t < this._offsets[0] &&
                0 < this._offsets[0]
              )
                return (this._activeTarget = null), void this._clear();
              for (var r = this._offsets.length; r--; ) {
                this._activeTarget !== this._targets[r] &&
                  t >= this._offsets[r] &&
                  ("undefined" == typeof this._offsets[r + 1] ||
                    t < this._offsets[r + 1]) &&
                  this._activate(this._targets[r]);
              }
            }
          }),
          (t._activate = function (e) {
            (this._activeTarget = e), this._clear();
            var t = this._selector.split(",");
            t = t.map(function (t) {
              return (
                t + '[data-target="' + e + '"],' + t + '[href="' + e + '"]'
              );
            });
            var n = Vn(t.join(","));
            n.hasClass(Zn)
              ? (n.closest(ti.DROPDOWN).find(ti.DROPDOWN_TOGGLE).addClass($n),
                n.addClass($n))
              : (n.addClass($n),
                n
                  .parents(ti.NAV_LIST_GROUP)
                  .prev(ti.NAV_LINKS + ", " + ti.LIST_ITEMS)
                  .addClass($n),
                n
                  .parents(ti.NAV_LIST_GROUP)
                  .prev(ti.NAV_ITEMS)
                  .children(ti.NAV_LINKS)
                  .addClass($n)),
              Vn(this._scrollElement).trigger(Jn.ACTIVATE, {
                relatedTarget: e,
              });
          }),
          (t._clear = function () {
            Vn(this._selector).filter(ti.ACTIVE).removeClass($n);
          }),
          (n._jQueryInterface = function (e) {
            return this.each(function () {
              var t = Vn(this).data(Yn);
              if (
                (t ||
                  ((t = new n(this, "object" == typeof e && e)),
                  Vn(this).data(Yn, t)),
                "string" == typeof e)
              ) {
                if ("undefined" == typeof t[e])
                  throw new TypeError('No method named "' + e + '"');
                t[e]();
              }
            });
          }),
          s(n, null, [
            {
              key: "VERSION",
              get: function () {
                return "4.1.1";
              },
            },
            {
              key: "Default",
              get: function () {
                return zn;
              },
            },
          ]),
          n
        );
      })()),
      Vn(window).on(Jn.LOAD_DATA_API, function () {
        for (var t = Vn.makeArray(Vn(ti.DATA_SPY)), e = t.length; e--; ) {
          var n = Vn(t[e]);
          ii._jQueryInterface.call(n, n.data());
        }
      }),
      (Vn.fn[Qn] = ii._jQueryInterface),
      (Vn.fn[Qn].Constructor = ii),
      (Vn.fn[Qn].noConflict = function () {
        return (Vn.fn[Qn] = qn), ii._jQueryInterface;
      }),
      ii),
    Ai =
      ((si = "." + (oi = "bs.tab")),
      (ai = (ri = e).fn.tab),
      (li = {
        HIDE: "hide" + si,
        HIDDEN: "hidden" + si,
        SHOW: "show" + si,
        SHOWN: "shown" + si,
        CLICK_DATA_API: "click" + si + ".data-api",
      }),
      (ci = "dropdown-menu"),
      (fi = "active"),
      (hi = "disabled"),
      (ui = "fade"),
      (di = "show"),
      (pi = ".dropdown"),
      (gi = ".nav, .list-group"),
      (mi = ".active"),
      (_i = "> li > .active"),
      (vi = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]'),
      (Ei = ".dropdown-toggle"),
      (yi = "> .dropdown-menu .active"),
      (bi = (function () {
        function i(t) {
          this._element = t;
        }
        var t = i.prototype;
        return (
          (t.show = function () {
            var n = this;
            if (
              !(
                (this._element.parentNode &&
                  this._element.parentNode.nodeType === Node.ELEMENT_NODE &&
                  ri(this._element).hasClass(fi)) ||
                ri(this._element).hasClass(hi)
              )
            ) {
              var t,
                i,
                e = ri(this._element).closest(gi)[0],
                r = gt.getSelectorFromElement(this._element);
              if (e) {
                var o = "UL" === e.nodeName ? _i : mi;
                i = (i = ri.makeArray(ri(e).find(o)))[i.length - 1];
              }
              var s = ri.Event(li.HIDE, { relatedTarget: this._element }),
                a = ri.Event(li.SHOW, { relatedTarget: i });
              if (
                (i && ri(i).trigger(s),
                ri(this._element).trigger(a),
                !a.isDefaultPrevented() && !s.isDefaultPrevented())
              ) {
                r && (t = ri(r)[0]), this._activate(this._element, e);
                var l = function () {
                  var t = ri.Event(li.HIDDEN, { relatedTarget: n._element }),
                    e = ri.Event(li.SHOWN, { relatedTarget: i });
                  ri(i).trigger(t), ri(n._element).trigger(e);
                };
                t ? this._activate(t, t.parentNode, l) : l();
              }
            }
          }),
          (t.dispose = function () {
            ri.removeData(this._element, oi), (this._element = null);
          }),
          (t._activate = function (t, e, n) {
            var i = this,
              r = (
                "UL" === e.nodeName ? ri(e).find(_i) : ri(e).children(mi)
              )[0],
              o = n && r && ri(r).hasClass(ui),
              s = function () {
                return i._transitionComplete(t, r, n);
              };
            if (r && o) {
              var a = gt.getTransitionDurationFromElement(r);
              ri(r).one(gt.TRANSITION_END, s).emulateTransitionEnd(a);
            } else s();
          }),
          (t._transitionComplete = function (t, e, n) {
            if (e) {
              ri(e).removeClass(di + " " + fi);
              var i = ri(e.parentNode).find(yi)[0];
              i && ri(i).removeClass(fi),
                "tab" === e.getAttribute("role") &&
                  e.setAttribute("aria-selected", !1);
            }
            if (
              (ri(t).addClass(fi),
              "tab" === t.getAttribute("role") &&
                t.setAttribute("aria-selected", !0),
              gt.reflow(t),
              ri(t).addClass(di),
              t.parentNode && ri(t.parentNode).hasClass(ci))
            ) {
              var r = ri(t).closest(pi)[0];
              r && ri(r).find(Ei).addClass(fi),
                t.setAttribute("aria-expanded", !0);
            }
            n && n();
          }),
          (i._jQueryInterface = function (n) {
            return this.each(function () {
              var t = ri(this),
                e = t.data(oi);
              if (
                (e || ((e = new i(this)), t.data(oi, e)), "string" == typeof n)
              ) {
                if ("undefined" == typeof e[n])
                  throw new TypeError('No method named "' + n + '"');
                e[n]();
              }
            });
          }),
          s(i, null, [
            {
              key: "VERSION",
              get: function () {
                return "4.1.1";
              },
            },
          ]),
          i
        );
      })()),
      ri(document).on(li.CLICK_DATA_API, vi, function (t) {
        t.preventDefault(), bi._jQueryInterface.call(ri(this), "show");
      }),
      (ri.fn.tab = bi._jQueryInterface),
      (ri.fn.tab.Constructor = bi),
      (ri.fn.tab.noConflict = function () {
        return (ri.fn.tab = ai), bi._jQueryInterface;
      }),
      bi);
  !(function (t) {
    if ("undefined" == typeof t)
      throw new TypeError(
        "Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript."
      );
    var e = t.fn.jquery.split(" ")[0].split(".");
    if (
      (e[0] < 2 && e[1] < 9) ||
      (1 === e[0] && 9 === e[1] && e[2] < 1) ||
      4 <= e[0]
    )
      throw new Error(
        "Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0"
      );
  })(e),
    (t.Util = gt),
    (t.Alert = mt),
    (t.Button = _t),
    (t.Carousel = vt),
    (t.Collapse = Et),
    (t.Dropdown = Ti),
    (t.Modal = Ci),
    (t.Popover = Ii),
    (t.Scrollspy = Di),
    (t.Tab = Ai),
    (t.Tooltip = wi),
    Object.defineProperty(t, "__esModule", { value: !0 });
});
//# sourceMappingURL=bootstrap.bundle.min.js.map
