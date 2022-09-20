<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/fontawesome-all.min.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/bootstrap.min.css"
        />
        <link
            rel="shortcut icon"
            href="http://127.0.0.1:8000/assets/images/logoIcon/favicon.png"
            type="image/x-icon"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/swiper.min.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/chosen.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/line-awesome.min.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/animate.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/resources/style/style.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/select2.min.css"
        />

        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/bootstrap-fileinput.css"
        />
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/resources/style/index.css"
        />
        <link
            href="http://127.0.0.1:8000/assets/templates/basic/frontend/css/color.php?color=808b92&amp;secondColor=3b5b93"
            rel="stylesheet"
        />

        <link
            rel="stylesheet"
            type="text/css"
            property="stylesheet"
            href="//127.0.0.1:8000/_debugbar/assets/stylesheets?v=1657488402&amp;theme=auto"
            data-turbolinks-eval="false"
            data-turbo-eval="false"
        />
        <script
            src="//127.0.0.1:8000/_debugbar/assets/javascript?v=1657488402"
            data-turbolinks-eval="false"
            data-turbo-eval="false"
        ></script>
        <script data-turbo-eval="false">
            jQuery.noConflict(true);
        </script>
        <script>
            Sfdump = window.Sfdump || (function (doc) { var refStyle = doc.createElement('style'), rxEsc = /([.*+?^${}()|\[\]\/\\])/g, idRx = /\bsf-dump-\d+-ref[012]\w+\b/, keyHint = 0 <= navigator.platform.toUpperCase().indexOf('MAC') ? 'Cmd' : 'Ctrl', addEventListener = function (e, n, cb) { e.addEventListener(n, cb, false); }; refStyle.innerHTML = '.phpdebugbar pre.sf-dump .sf-dump-compact, .sf-dump-str-collapse .sf-dump-str-collapse, .sf-dump-str-expand .sf-dump-str-expand { display: none; }'; (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); refStyle = doc.createElement('style'); (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); if (!doc.addEventListener) { addEventListener = function (element, eventName, callback) { element.attachEvent('on' + eventName, function (e) { e.preventDefault = function () {e.returnValue = false;}; e.target = e.srcElement; callback(e); }); }; } function toggle(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className, arrow, newClass; if (/\bsf-dump-compact\b/.test(oldClass)) { arrow = '▼'; newClass = 'sf-dump-expanded'; } else if (/\bsf-dump-expanded\b/.test(oldClass)) { arrow = '▶'; newClass = 'sf-dump-compact'; } else { return false; } if (doc.createEvent && s.dispatchEvent) { var event = doc.createEvent('Event'); event.initEvent('sf-dump-expanded' === newClass ? 'sfbeforedumpexpand' : 'sfbeforedumpcollapse', true, false); s.dispatchEvent(event); } a.lastChild.innerHTML = arrow; s.className = s.className.replace(/\bsf-dump-(compact|expanded)\b/, newClass); if (recursive) { try { a = s.querySelectorAll('.'+oldClass); for (s = 0; s < a.length; ++s) { if (-1 == a[s].className.indexOf(newClass)) { a[s].className = newClass; a[s].previousSibling.lastChild.innerHTML = arrow; } } } catch (e) { } } return true; }; function collapse(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-expanded\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function expand(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-compact\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function collapseAll(root) { var a = root.querySelector('a.sf-dump-toggle'); if (a) { collapse(a, true); expand(a); return true; } return false; } function reveal(node) { var previous, parents = []; while ((node = node.parentNode || {}) && (previous = node.previousSibling) && 'A' === previous.tagName) { parents.push(previous); } if (0 !== parents.length) { parents.forEach(function (parent) { expand(parent); }); return true; } return false; } function highlight(root, activeNode, nodes) { resetHighlightedNodes(root); Array.from(nodes||[]).forEach(function (node) { if (!/\bsf-dump-highlight\b/.test(node.className)) { node.className = node.className + ' sf-dump-highlight'; } }); if (!/\bsf-dump-highlight-active\b/.test(activeNode.className)) { activeNode.className = activeNode.className + ' sf-dump-highlight-active'; } } function resetHighlightedNodes(root) { Array.from(root.querySelectorAll('.sf-dump-str, .sf-dump-key, .sf-dump-public, .sf-dump-protected, .sf-dump-private')).forEach(function (strNode) { strNode.className = strNode.className.replace(/\bsf-dump-highlight\b/, ''); strNode.className = strNode.className.replace(/\bsf-dump-highlight-active\b/, ''); }); } return function (root, x) { root = doc.getElementById(root); var indentRx = new RegExp('^('+(root.getAttribute('data-indent-pad') || ' ').replace(rxEsc, '\\$1')+')+', 'm'), options = {"maxDepth":1,"maxStringLength":160,"fileLinkFormat":false}, elt = root.getElementsByTagName('A'), len = elt.length, i = 0, s, h, t = []; while (i < len) t.push(elt[i++]); for (i in x) { options[i] = x[i]; } function a(e, f) { addEventListener(root, e, function (e, n) { if ('A' == e.target.tagName) { f(e.target, e); } else if ('A' == e.target.parentNode.tagName) { f(e.target.parentNode, e); } else { n = /\bsf-dump-ellipsis\b/.test(e.target.className) ? e.target.parentNode : e.target; if ((n = n.nextElementSibling) && 'A' == n.tagName) { if (!/\bsf-dump-toggle\b/.test(n.className)) { n = n.nextElementSibling || n; } f(n, e, true); } } }); }; function isCtrlKey(e) { return e.ctrlKey || e.metaKey; } function xpathString(str) { var parts = str.match(/[^'"]+|['"]/g).map(function (part) { if ("'" == part) { return '"\'"'; } if ('"' == part) { return "'\"'"; } return "'" + part + "'"; }); return "concat(" + parts.join(",") + ", '')"; } function xpathHasClass(className) { return "contains(concat(' ', normalize-space(class=""), ' '), ' " + className +" ')"; } addEventListener(root, 'mouseover', function (e) { if ('' != refStyle.innerHTML) { refStyle.innerHTML = ''; } }); a('mouseover', function (a, e, c) { if (c) { e.target.style.cursor = "pointer"; } else if (a = idRx.exec(a.className)) { try { refStyle.innerHTML = '.phpdebugbar pre.sf-dump .'+a[0]+'{background-color: #B729D9; color: #FFF !important; border-radius: 2px}'; } catch (e) { } } }); a('click', function (a, e, c) { if (/\bsf-dump-toggle\b/.test(a.className)) { e.preventDefault(); if (!toggle(a, isCtrlKey(e))) { var r = doc.getElementById(a.getAttribute('href').slice(1)), s = r.previousSibling, f = r.parentNode, t = a.parentNode; t.replaceChild(r, a); f.replaceChild(a, s); t.insertBefore(s, r); f = f.firstChild.nodeValue.match(indentRx); t = t.firstChild.nodeValue.match(indentRx); if (f && t && f[0] !== t[0]) { r.innerHTML = r.innerHTML.replace(new RegExp('^'+f[0].replace(rxEsc, '\\$1'), 'mg'), t[0]); } if (/\bsf-dump-compact\b/.test(r.className)) { toggle(s, isCtrlKey(e)); } } if (c) { } else if (doc.getSelection) { try { doc.getSelection().removeAllRanges(); } catch (e) { doc.getSelection().empty(); } } else { doc.selection.empty(); } } else if (/\bsf-dump-str-toggle\b/.test(a.className)) { e.preventDefault(); e = a.parentNode.parentNode; e.className = e.className.replace(/\bsf-dump-str-(expand|collapse)\b/, a.parentNode.className); } }); elt = root.getElementsByTagName('SAMP'); len = elt.length; i = 0; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; if ('SAMP' == elt.tagName) { a = elt.previousSibling || {}; if ('A' != a.tagName) { a = doc.createElement('A'); a.className = 'sf-dump-ref'; elt.parentNode.insertBefore(a, elt); } else { a.innerHTML += ' '; } a.title = (a.title ? a.title+'\n[' : '[')+keyHint+'+click] Expand all children'; a.innerHTML += elt.className == 'sf-dump-compact' ? '<span>▶</span>' : '<span>▼</span>'; a.className += ' sf-dump-toggle'; x = 1; if ('sf-dump' != elt.parentNode.className) { x += elt.parentNode.getAttribute('data-depth')/1; } } else if (/\bsf-dump-ref\b/.test(elt.className) && (a = elt.getAttribute('href'))) { a = a.slice(1); elt.className += ' '+a; if (/[\[{]$/.test(elt.previousSibling.nodeValue)) { a = a != elt.nextSibling.id && doc.getElementById(a); try { s = a.nextSibling; elt.appendChild(a); s.parentNode.insertBefore(a, s); if (/^[@#]/.test(elt.innerHTML)) { elt.innerHTML += ' <span>▶</span>'; } else { elt.innerHTML = '<span>▶</span>'; elt.className = 'sf-dump-ref'; } elt.className += ' sf-dump-toggle'; } catch (e) { if ('&' == elt.innerHTML.charAt(0)) { elt.innerHTML = '…'; elt.className = 'sf-dump-ref'; } } } } } if (doc.evaluate && Array.from && root.children.length > 1) { root.setAttribute('tabindex', 0); SearchState = function () { this.nodes = []; this.idx = 0; }; SearchState.prototype = { next: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx < (this.nodes.length - 1) ? this.idx + 1 : 0; return this.current(); }, previous: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx > 0 ? this.idx - 1 : (this.nodes.length - 1); return this.current(); }, isEmpty: function () { return 0 === this.count(); }, current: function () { if (this.isEmpty()) { return null; } return this.nodes[this.idx]; }, reset: function () { this.nodes = []; this.idx = 0; }, count: function () { return this.nodes.length; }, }; function showCurrent(state) { var currentNode = state.current(), currentRect, searchRect; if (currentNode) { reveal(currentNode); highlight(root, currentNode, state.nodes); if ('scrollIntoView' in currentNode) { currentNode.scrollIntoView(true); currentRect = currentNode.getBoundingClientRect(); searchRect = search.getBoundingClientRect(); if (currentRect.top < (searchRect.top + searchRect.height)) { window.scrollBy(0, -(searchRect.top + searchRect.height + 5)); } } } counter.textContent = (state.isEmpty() ? 0 : state.idx + 1) + ' of ' + state.count(); } var search = doc.createElement('div'); search.className = 'sf-dump-search-wrapper sf-dump-search-hidden'; search.innerHTML = ' <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0<\/span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> '; root.insertBefore(search, root.firstChild); var state = new SearchState(); var searchInput = search.querySelector('.sf-dump-search-input'); var counter = search.querySelector('.sf-dump-search-count'); var searchInputTimer = 0; var previousSearchQuery = ''; addEventListener(searchInput, 'keyup', function (e) { var searchQuery = e.target.value; /* Don't perform anything if the pressed key didn't change the query */ if (searchQuery === previousSearchQuery) { return; } previousSearchQuery = searchQuery; clearTimeout(searchInputTimer); searchInputTimer = setTimeout(function () { state.reset(); collapseAll(root); resetHighlightedNodes(root); if ('' === searchQuery) { counter.textContent = '0 of 0'; return; } var classMatches = [ "sf-dump-str", "sf-dump-key", "sf-dump-public", "sf-dump-protected", "sf-dump-private", ].map(xpathHasClass).join(' or '); var xpathResult = doc.evaluate('.//span[' + classMatches + '][contains(translate(child::text(), ' + xpathString(searchQuery.toUpperCase()) + ', ' + xpathString(searchQuery.toLowerCase()) + '), ' + xpathString(searchQuery.toLowerCase()) + ')]', root, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null); while (node = xpathResult.iterateNext()) state.nodes.push(node); showCurrent(state); }, 400); }); Array.from(search.querySelectorAll('.sf-dump-search-input-next, .sf-dump-search-input-previous')).forEach(function (btn) { addEventListener(btn, 'click', function (e) { e.preventDefault(); -1 !== e.target.className.indexOf('next') ? state.next() : state.previous(); searchInput.focus(); collapseAll(root); showCurrent(state); }) }); addEventListener(root, 'keydown', function (e) { var isSearchActive = !/\bsf-dump-search-hidden\b/.test(search.className); if ((114 === e.keyCode && !isSearchActive) || (isCtrlKey(e) && 70 === e.keyCode)) { /* F3 or CMD/CTRL + F */ if (70 === e.keyCode && document.activeElement === searchInput) { /* * If CMD/CTRL + F is hit while having focus on search input, * the user probably meant to trigger browser search instead. * Let the browser execute its behavior: */ return; } e.preventDefault(); search.className = search.className.replace(/\bsf-dump-search-hidden\b/, ''); searchInput.focus(); } else if (isSearchActive) { if (27 === e.keyCode) { /* ESC key */ search.className += ' sf-dump-search-hidden'; e.preventDefault(); resetHighlightedNodes(root); searchInput.value = ''; } else if ( (isCtrlKey(e) && 71 === e.keyCode) /* CMD/CTRL + G */ || 13 === e.keyCode /* Enter */ || 114 === e.keyCode /* F3 */ ) { e.preventDefault(); e.shiftKey ? state.previous() : state.next(); collapseAll(root); showCurrent(state); } } }); } if (0 >= options.maxStringLength) { return; } try { elt = root.querySelectorAll('.sf-dump-str'); len = elt.length; i = 0; t = []; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; s = elt.innerText || elt.textContent; x = s.length - options.maxStringLength; if (0 < x) { h = elt.innerHTML; elt[elt.innerText ? 'innerText' : 'textContent'] = s.substring(0, options.maxStringLength); elt.className += ' sf-dump-str-collapse'; elt.innerHTML = '<span class=sf-dump-str-collapse>'+h+'<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span>'+ '<span class=sf-dump-str-expand>'+elt.innerHTML+'<a class="sf-dump-ref sf-dump-str-toggle" title="'+x+' remaining characters"> ▶</a></span>'; } } } catch (e) { } }; })(document);
        </script>
        <style>
            .phpdebugbar pre.sf-dump .sf-dump-compact,
            .sf-dump-str-collapse .sf-dump-str-collapse,
            .sf-dump-str-expand .sf-dump-str-expand {
                display: none;
            }
        </style>
        <style></style>
        <style>
            .phpdebugbar pre.sf-dump {
                display: block;
                white-space: pre;
                padding: 5px;
                overflow: initial !important;
            }
            .phpdebugbar pre.sf-dump:after {
                content: "";
                visibility: hidden;
                display: block;
                height: 0;
                clear: both;
            }
            .phpdebugbar pre.sf-dump span {
                display: inline;
            }
            .phpdebugbar pre.sf-dump a {
                text-decoration: none;
                cursor: pointer;
                border: 0;
                outline: none;
                color: inherit;
            }
            .phpdebugbar pre.sf-dump img {
                max-width: 50em;
                max-height: 50em;
                margin: 0.5em 0 0 0;
                padding: 0;
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis {
                display: inline-block;
                overflow: visible;
                text-overflow: ellipsis;
                max-width: 5em;
                white-space: nowrap;
                overflow: hidden;
                vertical-align: top;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis + .sf-dump-ellipsis {
                max-width: none;
            }
            .phpdebugbar pre.sf-dump code {
                display: inline;
                padding: 0;
                background: none;
            }
            .sf-dump-public.sf-dump-highlight,
            .sf-dump-protected.sf-dump-highlight,
            .sf-dump-private.sf-dump-highlight,
            .sf-dump-str.sf-dump-highlight,
            .sf-dump-key.sf-dump-highlight {
                background: rgba(111, 172, 204, 0.3);
                border: 1px solid #7DA0B1;
                border-radius: 3px;
            }
            .sf-dump-public.sf-dump-highlight-active,
            .sf-dump-protected.sf-dump-highlight-active,
            .sf-dump-private.sf-dump-highlight-active,
            .sf-dump-str.sf-dump-highlight-active,
            .sf-dump-key.sf-dump-highlight-active {
                background: rgba(253, 175, 0, 0.4);
                border: 1px solid #ffa500;
                border-radius: 3px;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-hidden {
                display: none !important;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-wrapper {
                font-size: 0;
                white-space: nowrap;
                margin-bottom: 5px;
                display: flex;
                position: -webkit-sticky;
                position: sticky;
                top: 5px;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > * {
                vertical-align: top;
                box-sizing: border-box;
                height: 21px;
                font-weight: normal;
                border-radius: 0;
                background: #FFF;
                color: #757575;
                border: 1px solid #BBB;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > input.sf-dump-search-input {
                padding: 3px;
                height: 21px;
                font-size: 12px;
                border-right: none;
                border-top-left-radius: 3px;
                border-bottom-left-radius: 3px;
                color: #000;
                min-width: 15px;
                width: 100%;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next,
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-previous {
                background: #F2F2F2;
                outline: none;
                border-left: none;
                font-size: 0;
                line-height: 0;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next {
                border-top-right-radius: 3px;
                border-bottom-right-radius: 3px;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next
                > svg,
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-previous
                > svg {
                pointer-events: none;
                width: 12px;
                height: 12px;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-count {
                display: inline-block;
                padding: 0 5px;
                margin: 0;
                border-left: none;
                line-height: 21px;
                font-size: 12px;
            }
            .phpdebugbar pre.sf-dump,
            .phpdebugbar pre.sf-dump .sf-dump-default {
                word-wrap: break-word;
                white-space: pre-wrap;
                word-break: normal;
            }
            .phpdebugbar pre.sf-dump .sf-dump-num {
                font-weight: bold;
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-const {
                font-weight: bold;
            }
            .phpdebugbar pre.sf-dump .sf-dump-str {
                font-weight: bold;
                color: #3A9B26;
            }
            .phpdebugbar pre.sf-dump .sf-dump-note {
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ref {
                color: #7B7B7B;
            }
            .phpdebugbar pre.sf-dump .sf-dump-public {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-protected {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-private {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-meta {
                color: #B729D9;
            }
            .phpdebugbar pre.sf-dump .sf-dump-key {
                color: #3A9B26;
            }
            .phpdebugbar pre.sf-dump .sf-dump-index {
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis {
                color: #A0A000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ns {
                user-select: none;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis-note {
                color: #1299DA;
            }
        </style>
        <link
            rel="stylesheet"
            type="text/css"
            property="stylesheet"
            href="//127.0.0.1:8000/_debugbar/assets/stylesheets?v=1657488402&amp;theme=auto"
            data-turbolinks-eval="false"
            data-turbo-eval="false"
        />
        <script
            src="//127.0.0.1:8000/_debugbar/assets/javascript?v=1657488402"
            data-turbolinks-eval="false"
            data-turbo-eval="false"
        ></script>
        <script data-turbo-eval="false">
            jQuery.noConflict(true);
        </script>
        <script>
            Sfdump = window.Sfdump || (function (doc) { var refStyle = doc.createElement('style'), rxEsc = /([.*+?^${}()|\[\]\/\\])/g, idRx = /\bsf-dump-\d+-ref[012]\w+\b/, keyHint = 0 <= navigator.platform.toUpperCase().indexOf('MAC') ? 'Cmd' : 'Ctrl', addEventListener = function (e, n, cb) { e.addEventListener(n, cb, false); }; refStyle.innerHTML = '.phpdebugbar pre.sf-dump .sf-dump-compact, .sf-dump-str-collapse .sf-dump-str-collapse, .sf-dump-str-expand .sf-dump-str-expand { display: none; }'; (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); refStyle = doc.createElement('style'); (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); if (!doc.addEventListener) { addEventListener = function (element, eventName, callback) { element.attachEvent('on' + eventName, function (e) { e.preventDefault = function () {e.returnValue = false;}; e.target = e.srcElement; callback(e); }); }; } function toggle(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className, arrow, newClass; if (/\bsf-dump-compact\b/.test(oldClass)) { arrow = '▼'; newClass = 'sf-dump-expanded'; } else if (/\bsf-dump-expanded\b/.test(oldClass)) { arrow = '▶'; newClass = 'sf-dump-compact'; } else { return false; } if (doc.createEvent && s.dispatchEvent) { var event = doc.createEvent('Event'); event.initEvent('sf-dump-expanded' === newClass ? 'sfbeforedumpexpand' : 'sfbeforedumpcollapse', true, false); s.dispatchEvent(event); } a.lastChild.innerHTML = arrow; s.className = s.className.replace(/\bsf-dump-(compact|expanded)\b/, newClass); if (recursive) { try { a = s.querySelectorAll('.'+oldClass); for (s = 0; s < a.length; ++s) { if (-1 == a[s].className.indexOf(newClass)) { a[s].className = newClass; a[s].previousSibling.lastChild.innerHTML = arrow; } } } catch (e) { } } return true; }; function collapse(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-expanded\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function expand(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-compact\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function collapseAll(root) { var a = root.querySelector('a.sf-dump-toggle'); if (a) { collapse(a, true); expand(a); return true; } return false; } function reveal(node) { var previous, parents = []; while ((node = node.parentNode || {}) && (previous = node.previousSibling) && 'A' === previous.tagName) { parents.push(previous); } if (0 !== parents.length) { parents.forEach(function (parent) { expand(parent); }); return true; } return false; } function highlight(root, activeNode, nodes) { resetHighlightedNodes(root); Array.from(nodes||[]).forEach(function (node) { if (!/\bsf-dump-highlight\b/.test(node.className)) { node.className = node.className + ' sf-dump-highlight'; } }); if (!/\bsf-dump-highlight-active\b/.test(activeNode.className)) { activeNode.className = activeNode.className + ' sf-dump-highlight-active'; } } function resetHighlightedNodes(root) { Array.from(root.querySelectorAll('.sf-dump-str, .sf-dump-key, .sf-dump-public, .sf-dump-protected, .sf-dump-private')).forEach(function (strNode) { strNode.className = strNode.className.replace(/\bsf-dump-highlight\b/, ''); strNode.className = strNode.className.replace(/\bsf-dump-highlight-active\b/, ''); }); } return function (root, x) { root = doc.getElementById(root); var indentRx = new RegExp('^('+(root.getAttribute('data-indent-pad') || ' ').replace(rxEsc, '\\$1')+')+', 'm'), options = {"maxDepth":1,"maxStringLength":160,"fileLinkFormat":false}, elt = root.getElementsByTagName('A'), len = elt.length, i = 0, s, h, t = []; while (i < len) t.push(elt[i++]); for (i in x) { options[i] = x[i]; } function a(e, f) { addEventListener(root, e, function (e, n) { if ('A' == e.target.tagName) { f(e.target, e); } else if ('A' == e.target.parentNode.tagName) { f(e.target.parentNode, e); } else { n = /\bsf-dump-ellipsis\b/.test(e.target.className) ? e.target.parentNode : e.target; if ((n = n.nextElementSibling) && 'A' == n.tagName) { if (!/\bsf-dump-toggle\b/.test(n.className)) { n = n.nextElementSibling || n; } f(n, e, true); } } }); }; function isCtrlKey(e) { return e.ctrlKey || e.metaKey; } function xpathString(str) { var parts = str.match(/[^'"]+|['"]/g).map(function (part) { if ("'" == part) { return '"\'"'; } if ('"' == part) { return "'\"'"; } return "'" + part + "'"; }); return "concat(" + parts.join(",") + ", '')"; } function xpathHasClass(className) { return "contains(concat(' ', normalize-space(class=""), ' '), ' " + className +" ')"; } addEventListener(root, 'mouseover', function (e) { if ('' != refStyle.innerHTML) { refStyle.innerHTML = ''; } }); a('mouseover', function (a, e, c) { if (c) { e.target.style.cursor = "pointer"; } else if (a = idRx.exec(a.className)) { try { refStyle.innerHTML = '.phpdebugbar pre.sf-dump .'+a[0]+'{background-color: #B729D9; color: #FFF !important; border-radius: 2px}'; } catch (e) { } } }); a('click', function (a, e, c) { if (/\bsf-dump-toggle\b/.test(a.className)) { e.preventDefault(); if (!toggle(a, isCtrlKey(e))) { var r = doc.getElementById(a.getAttribute('href').slice(1)), s = r.previousSibling, f = r.parentNode, t = a.parentNode; t.replaceChild(r, a); f.replaceChild(a, s); t.insertBefore(s, r); f = f.firstChild.nodeValue.match(indentRx); t = t.firstChild.nodeValue.match(indentRx); if (f && t && f[0] !== t[0]) { r.innerHTML = r.innerHTML.replace(new RegExp('^'+f[0].replace(rxEsc, '\\$1'), 'mg'), t[0]); } if (/\bsf-dump-compact\b/.test(r.className)) { toggle(s, isCtrlKey(e)); } } if (c) { } else if (doc.getSelection) { try { doc.getSelection().removeAllRanges(); } catch (e) { doc.getSelection().empty(); } } else { doc.selection.empty(); } } else if (/\bsf-dump-str-toggle\b/.test(a.className)) { e.preventDefault(); e = a.parentNode.parentNode; e.className = e.className.replace(/\bsf-dump-str-(expand|collapse)\b/, a.parentNode.className); } }); elt = root.getElementsByTagName('SAMP'); len = elt.length; i = 0; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; if ('SAMP' == elt.tagName) { a = elt.previousSibling || {}; if ('A' != a.tagName) { a = doc.createElement('A'); a.className = 'sf-dump-ref'; elt.parentNode.insertBefore(a, elt); } else { a.innerHTML += ' '; } a.title = (a.title ? a.title+'\n[' : '[')+keyHint+'+click] Expand all children'; a.innerHTML += elt.className == 'sf-dump-compact' ? '<span>▶</span>' : '<span>▼</span>'; a.className += ' sf-dump-toggle'; x = 1; if ('sf-dump' != elt.parentNode.className) { x += elt.parentNode.getAttribute('data-depth')/1; } } else if (/\bsf-dump-ref\b/.test(elt.className) && (a = elt.getAttribute('href'))) { a = a.slice(1); elt.className += ' '+a; if (/[\[{]$/.test(elt.previousSibling.nodeValue)) { a = a != elt.nextSibling.id && doc.getElementById(a); try { s = a.nextSibling; elt.appendChild(a); s.parentNode.insertBefore(a, s); if (/^[@#]/.test(elt.innerHTML)) { elt.innerHTML += ' <span>▶</span>'; } else { elt.innerHTML = '<span>▶</span>'; elt.className = 'sf-dump-ref'; } elt.className += ' sf-dump-toggle'; } catch (e) { if ('&' == elt.innerHTML.charAt(0)) { elt.innerHTML = '…'; elt.className = 'sf-dump-ref'; } } } } } if (doc.evaluate && Array.from && root.children.length > 1) { root.setAttribute('tabindex', 0); SearchState = function () { this.nodes = []; this.idx = 0; }; SearchState.prototype = { next: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx < (this.nodes.length - 1) ? this.idx + 1 : 0; return this.current(); }, previous: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx > 0 ? this.idx - 1 : (this.nodes.length - 1); return this.current(); }, isEmpty: function () { return 0 === this.count(); }, current: function () { if (this.isEmpty()) { return null; } return this.nodes[this.idx]; }, reset: function () { this.nodes = []; this.idx = 0; }, count: function () { return this.nodes.length; }, }; function showCurrent(state) { var currentNode = state.current(), currentRect, searchRect; if (currentNode) { reveal(currentNode); highlight(root, currentNode, state.nodes); if ('scrollIntoView' in currentNode) { currentNode.scrollIntoView(true); currentRect = currentNode.getBoundingClientRect(); searchRect = search.getBoundingClientRect(); if (currentRect.top < (searchRect.top + searchRect.height)) { window.scrollBy(0, -(searchRect.top + searchRect.height + 5)); } } } counter.textContent = (state.isEmpty() ? 0 : state.idx + 1) + ' of ' + state.count(); } var search = doc.createElement('div'); search.className = 'sf-dump-search-wrapper sf-dump-search-hidden'; search.innerHTML = ' <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0<\/span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> '; root.insertBefore(search, root.firstChild); var state = new SearchState(); var searchInput = search.querySelector('.sf-dump-search-input'); var counter = search.querySelector('.sf-dump-search-count'); var searchInputTimer = 0; var previousSearchQuery = ''; addEventListener(searchInput, 'keyup', function (e) { var searchQuery = e.target.value; /* Don't perform anything if the pressed key didn't change the query */ if (searchQuery === previousSearchQuery) { return; } previousSearchQuery = searchQuery; clearTimeout(searchInputTimer); searchInputTimer = setTimeout(function () { state.reset(); collapseAll(root); resetHighlightedNodes(root); if ('' === searchQuery) { counter.textContent = '0 of 0'; return; } var classMatches = [ "sf-dump-str", "sf-dump-key", "sf-dump-public", "sf-dump-protected", "sf-dump-private", ].map(xpathHasClass).join(' or '); var xpathResult = doc.evaluate('.//span[' + classMatches + '][contains(translate(child::text(), ' + xpathString(searchQuery.toUpperCase()) + ', ' + xpathString(searchQuery.toLowerCase()) + '), ' + xpathString(searchQuery.toLowerCase()) + ')]', root, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null); while (node = xpathResult.iterateNext()) state.nodes.push(node); showCurrent(state); }, 400); }); Array.from(search.querySelectorAll('.sf-dump-search-input-next, .sf-dump-search-input-previous')).forEach(function (btn) { addEventListener(btn, 'click', function (e) { e.preventDefault(); -1 !== e.target.className.indexOf('next') ? state.next() : state.previous(); searchInput.focus(); collapseAll(root); showCurrent(state); }) }); addEventListener(root, 'keydown', function (e) { var isSearchActive = !/\bsf-dump-search-hidden\b/.test(search.className); if ((114 === e.keyCode && !isSearchActive) || (isCtrlKey(e) && 70 === e.keyCode)) { /* F3 or CMD/CTRL + F */ if (70 === e.keyCode && document.activeElement === searchInput) { /* * If CMD/CTRL + F is hit while having focus on search input, * the user probably meant to trigger browser search instead. * Let the browser execute its behavior: */ return; } e.preventDefault(); search.className = search.className.replace(/\bsf-dump-search-hidden\b/, ''); searchInput.focus(); } else if (isSearchActive) { if (27 === e.keyCode) { /* ESC key */ search.className += ' sf-dump-search-hidden'; e.preventDefault(); resetHighlightedNodes(root); searchInput.value = ''; } else if ( (isCtrlKey(e) && 71 === e.keyCode) /* CMD/CTRL + G */ || 13 === e.keyCode /* Enter */ || 114 === e.keyCode /* F3 */ ) { e.preventDefault(); e.shiftKey ? state.previous() : state.next(); collapseAll(root); showCurrent(state); } } }); } if (0 >= options.maxStringLength) { return; } try { elt = root.querySelectorAll('.sf-dump-str'); len = elt.length; i = 0; t = []; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; s = elt.innerText || elt.textContent; x = s.length - options.maxStringLength; if (0 < x) { h = elt.innerHTML; elt[elt.innerText ? 'innerText' : 'textContent'] = s.substring(0, options.maxStringLength); elt.className += ' sf-dump-str-collapse'; elt.innerHTML = '<span class=sf-dump-str-collapse>'+h+'<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span>'+ '<span class=sf-dump-str-expand>'+elt.innerHTML+'<a class="sf-dump-ref sf-dump-str-toggle" title="'+x+' remaining characters"> ▶</a></span>'; } } } catch (e) { } }; })(document);
        </script>
        <style>
            .phpdebugbar pre.sf-dump .sf-dump-compact,
            .sf-dump-str-collapse .sf-dump-str-collapse,
            .sf-dump-str-expand .sf-dump-str-expand {
                display: none;
            }
        </style>
        <style></style>
        <style>
            .phpdebugbar pre.sf-dump {
                display: block;
                white-space: pre;
                padding: 5px;
                overflow: initial !important;
            }
            .phpdebugbar pre.sf-dump:after {
                content: "";
                visibility: hidden;
                display: block;
                height: 0;
                clear: both;
            }
            .phpdebugbar pre.sf-dump span {
                display: inline;
            }
            .phpdebugbar pre.sf-dump a {
                text-decoration: none;
                cursor: pointer;
                border: 0;
                outline: none;
                color: inherit;
            }
            .phpdebugbar pre.sf-dump img {
                max-width: 50em;
                max-height: 50em;
                margin: 0.5em 0 0 0;
                padding: 0;
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis {
                display: inline-block;
                overflow: visible;
                text-overflow: ellipsis;
                max-width: 5em;
                white-space: nowrap;
                overflow: hidden;
                vertical-align: top;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis + .sf-dump-ellipsis {
                max-width: none;
            }
            .phpdebugbar pre.sf-dump code {
                display: inline;
                padding: 0;
                background: none;
            }
            .sf-dump-public.sf-dump-highlight,
            .sf-dump-protected.sf-dump-highlight,
            .sf-dump-private.sf-dump-highlight,
            .sf-dump-str.sf-dump-highlight,
            .sf-dump-key.sf-dump-highlight {
                background: rgba(111, 172, 204, 0.3);
                border: 1px solid #7DA0B1;
                border-radius: 3px;
            }
            .sf-dump-public.sf-dump-highlight-active,
            .sf-dump-protected.sf-dump-highlight-active,
            .sf-dump-private.sf-dump-highlight-active,
            .sf-dump-str.sf-dump-highlight-active,
            .sf-dump-key.sf-dump-highlight-active {
                background: rgba(253, 175, 0, 0.4);
                border: 1px solid #ffa500;
                border-radius: 3px;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-hidden {
                display: none !important;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-wrapper {
                font-size: 0;
                white-space: nowrap;
                margin-bottom: 5px;
                display: flex;
                position: -webkit-sticky;
                position: sticky;
                top: 5px;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > * {
                vertical-align: top;
                box-sizing: border-box;
                height: 21px;
                font-weight: normal;
                border-radius: 0;
                background: #FFF;
                color: #757575;
                border: 1px solid #BBB;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > input.sf-dump-search-input {
                padding: 3px;
                height: 21px;
                font-size: 12px;
                border-right: none;
                border-top-left-radius: 3px;
                border-bottom-left-radius: 3px;
                color: #000;
                min-width: 15px;
                width: 100%;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next,
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-previous {
                background: #F2F2F2;
                outline: none;
                border-left: none;
                font-size: 0;
                line-height: 0;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next {
                border-top-right-radius: 3px;
                border-bottom-right-radius: 3px;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next
                > svg,
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-previous
                > svg {
                pointer-events: none;
                width: 12px;
                height: 12px;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-count {
                display: inline-block;
                padding: 0 5px;
                margin: 0;
                border-left: none;
                line-height: 21px;
                font-size: 12px;
            }
            .phpdebugbar pre.sf-dump,
            .phpdebugbar pre.sf-dump .sf-dump-default {
                word-wrap: break-word;
                white-space: pre-wrap;
                word-break: normal;
            }
            .phpdebugbar pre.sf-dump .sf-dump-num {
                font-weight: bold;
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-const {
                font-weight: bold;
            }
            .phpdebugbar pre.sf-dump .sf-dump-str {
                font-weight: bold;
                color: #3A9B26;
            }
            .phpdebugbar pre.sf-dump .sf-dump-note {
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ref {
                color: #7B7B7B;
            }
            .phpdebugbar pre.sf-dump .sf-dump-public {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-protected {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-private {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-meta {
                color: #B729D9;
            }
            .phpdebugbar pre.sf-dump .sf-dump-key {
                color: #3A9B26;
            }
            .phpdebugbar pre.sf-dump .sf-dump-index {
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis {
                color: #A0A000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ns {
                user-select: none;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis-note {
                color: #1299DA;
            }
        </style>
        <link
            rel="stylesheet"
            type="text/css"
            property="stylesheet"
            href="//127.0.0.1:8000/_debugbar/assets/stylesheets?v=1657488402&amp;theme=auto"
            data-turbolinks-eval="false"
            data-turbo-eval="false"
        />
        <script
            src="//127.0.0.1:8000/_debugbar/assets/javascript?v=1657488402"
            data-turbolinks-eval="false"
            data-turbo-eval="false"
        ></script>
        <script src="//127.0.0.1:8000/assets/resources/templates/basic/frontend/js/dropzone.js"></script>

        <script data-turbo-eval="false">
            jQuery.noConflict(true);
        </script>
        <script>
            Sfdump = window.Sfdump || (function (doc) { var refStyle = doc.createElement('style'), rxEsc = /([.*+?^${}()|\[\]\/\\])/g, idRx = /\bsf-dump-\d+-ref[012]\w+\b/, keyHint = 0 <= navigator.platform.toUpperCase().indexOf('MAC') ? 'Cmd' : 'Ctrl', addEventListener = function (e, n, cb) { e.addEventListener(n, cb, false); }; refStyle.innerHTML = '.phpdebugbar pre.sf-dump .sf-dump-compact, .sf-dump-str-collapse .sf-dump-str-collapse, .sf-dump-str-expand .sf-dump-str-expand { display: none; }'; (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); refStyle = doc.createElement('style'); (doc.documentElement.firstElementChild || doc.documentElement.children[0]).appendChild(refStyle); if (!doc.addEventListener) { addEventListener = function (element, eventName, callback) { element.attachEvent('on' + eventName, function (e) { e.preventDefault = function () {e.returnValue = false;}; e.target = e.srcElement; callback(e); }); }; } function toggle(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className, arrow, newClass; if (/\bsf-dump-compact\b/.test(oldClass)) { arrow = '▼'; newClass = 'sf-dump-expanded'; } else if (/\bsf-dump-expanded\b/.test(oldClass)) { arrow = '▶'; newClass = 'sf-dump-compact'; } else { return false; } if (doc.createEvent && s.dispatchEvent) { var event = doc.createEvent('Event'); event.initEvent('sf-dump-expanded' === newClass ? 'sfbeforedumpexpand' : 'sfbeforedumpcollapse', true, false); s.dispatchEvent(event); } a.lastChild.innerHTML = arrow; s.className = s.className.replace(/\bsf-dump-(compact|expanded)\b/, newClass); if (recursive) { try { a = s.querySelectorAll('.'+oldClass); for (s = 0; s < a.length; ++s) { if (-1 == a[s].className.indexOf(newClass)) { a[s].className = newClass; a[s].previousSibling.lastChild.innerHTML = arrow; } } } catch (e) { } } return true; }; function collapse(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-expanded\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function expand(a, recursive) { var s = a.nextSibling || {}, oldClass = s.className; if (/\bsf-dump-compact\b/.test(oldClass)) { toggle(a, recursive); return true; } return false; }; function collapseAll(root) { var a = root.querySelector('a.sf-dump-toggle'); if (a) { collapse(a, true); expand(a); return true; } return false; } function reveal(node) { var previous, parents = []; while ((node = node.parentNode || {}) && (previous = node.previousSibling) && 'A' === previous.tagName) { parents.push(previous); } if (0 !== parents.length) { parents.forEach(function (parent) { expand(parent); }); return true; } return false; } function highlight(root, activeNode, nodes) { resetHighlightedNodes(root); Array.from(nodes||[]).forEach(function (node) { if (!/\bsf-dump-highlight\b/.test(node.className)) { node.className = node.className + ' sf-dump-highlight'; } }); if (!/\bsf-dump-highlight-active\b/.test(activeNode.className)) { activeNode.className = activeNode.className + ' sf-dump-highlight-active'; } } function resetHighlightedNodes(root) { Array.from(root.querySelectorAll('.sf-dump-str, .sf-dump-key, .sf-dump-public, .sf-dump-protected, .sf-dump-private')).forEach(function (strNode) { strNode.className = strNode.className.replace(/\bsf-dump-highlight\b/, ''); strNode.className = strNode.className.replace(/\bsf-dump-highlight-active\b/, ''); }); } return function (root, x) { root = doc.getElementById(root); var indentRx = new RegExp('^('+(root.getAttribute('data-indent-pad') || ' ').replace(rxEsc, '\\$1')+')+', 'm'), options = {"maxDepth":1,"maxStringLength":160,"fileLinkFormat":false}, elt = root.getElementsByTagName('A'), len = elt.length, i = 0, s, h, t = []; while (i < len) t.push(elt[i++]); for (i in x) { options[i] = x[i]; } function a(e, f) { addEventListener(root, e, function (e, n) { if ('A' == e.target.tagName) { f(e.target, e); } else if ('A' == e.target.parentNode.tagName) { f(e.target.parentNode, e); } else { n = /\bsf-dump-ellipsis\b/.test(e.target.className) ? e.target.parentNode : e.target; if ((n = n.nextElementSibling) && 'A' == n.tagName) { if (!/\bsf-dump-toggle\b/.test(n.className)) { n = n.nextElementSibling || n; } f(n, e, true); } } }); }; function isCtrlKey(e) { return e.ctrlKey || e.metaKey; } function xpathString(str) { var parts = str.match(/[^'"]+|['"]/g).map(function (part) { if ("'" == part) { return '"\'"'; } if ('"' == part) { return "'\"'"; } return "'" + part + "'"; }); return "concat(" + parts.join(",") + ", '')"; } function xpathHasClass(className) { return "contains(concat(' ', normalize-space(@class), ' '), ' " + className +" ')"; } addEventListener(root, 'mouseover', function (e) { if ('' != refStyle.innerHTML) { refStyle.innerHTML = ''; } }); a('mouseover', function (a, e, c) { if (c) { e.target.style.cursor = "pointer"; } else if (a = idRx.exec(a.className)) { try { refStyle.innerHTML = '.phpdebugbar pre.sf-dump .'+a[0]+'{background-color: #B729D9; color: #FFF !important; border-radius: 2px}'; } catch (e) { } } }); a('click', function (a, e, c) { if (/\bsf-dump-toggle\b/.test(a.className)) { e.preventDefault(); if (!toggle(a, isCtrlKey(e))) { var r = doc.getElementById(a.getAttribute('href').slice(1)), s = r.previousSibling, f = r.parentNode, t = a.parentNode; t.replaceChild(r, a); f.replaceChild(a, s); t.insertBefore(s, r); f = f.firstChild.nodeValue.match(indentRx); t = t.firstChild.nodeValue.match(indentRx); if (f && t && f[0] !== t[0]) { r.innerHTML = r.innerHTML.replace(new RegExp('^'+f[0].replace(rxEsc, '\\$1'), 'mg'), t[0]); } if (/\bsf-dump-compact\b/.test(r.className)) { toggle(s, isCtrlKey(e)); } } if (c) { } else if (doc.getSelection) { try { doc.getSelection().removeAllRanges(); } catch (e) { doc.getSelection().empty(); } } else { doc.selection.empty(); } } else if (/\bsf-dump-str-toggle\b/.test(a.className)) { e.preventDefault(); e = a.parentNode.parentNode; e.className = e.className.replace(/\bsf-dump-str-(expand|collapse)\b/, a.parentNode.className); } }); elt = root.getElementsByTagName('SAMP'); len = elt.length; i = 0; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; if ('SAMP' == elt.tagName) { a = elt.previousSibling || {}; if ('A' != a.tagName) { a = doc.createElement('A'); a.className = 'sf-dump-ref'; elt.parentNode.insertBefore(a, elt); } else { a.innerHTML += ' '; } a.title = (a.title ? a.title+'\n[' : '[')+keyHint+'+click] Expand all children'; a.innerHTML += elt.className == 'sf-dump-compact' ? '<span>▶</span>' : '<span>▼</span>'; a.className += ' sf-dump-toggle'; x = 1; if ('sf-dump' != elt.parentNode.className) { x += elt.parentNode.getAttribute('data-depth')/1; } } else if (/\bsf-dump-ref\b/.test(elt.className) && (a = elt.getAttribute('href'))) { a = a.slice(1); elt.className += ' '+a; if (/[\[{]$/.test(elt.previousSibling.nodeValue)) { a = a != elt.nextSibling.id && doc.getElementById(a); try { s = a.nextSibling; elt.appendChild(a); s.parentNode.insertBefore(a, s); if (/^[@#]/.test(elt.innerHTML)) { elt.innerHTML += ' <span>▶</span>'; } else { elt.innerHTML = '<span>▶</span>'; elt.className = 'sf-dump-ref'; } elt.className += ' sf-dump-toggle'; } catch (e) { if ('&' == elt.innerHTML.charAt(0)) { elt.innerHTML = '…'; elt.className = 'sf-dump-ref'; } } } } } if (doc.evaluate && Array.from && root.children.length > 1) { root.setAttribute('tabindex', 0); SearchState = function () { this.nodes = []; this.idx = 0; }; SearchState.prototype = { next: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx < (this.nodes.length - 1) ? this.idx + 1 : 0; return this.current(); }, previous: function () { if (this.isEmpty()) { return this.current(); } this.idx = this.idx > 0 ? this.idx - 1 : (this.nodes.length - 1); return this.current(); }, isEmpty: function () { return 0 === this.count(); }, current: function () { if (this.isEmpty()) { return null; } return this.nodes[this.idx]; }, reset: function () { this.nodes = []; this.idx = 0; }, count: function () { return this.nodes.length; }, }; function showCurrent(state) { var currentNode = state.current(), currentRect, searchRect; if (currentNode) { reveal(currentNode); highlight(root, currentNode, state.nodes); if ('scrollIntoView' in currentNode) { currentNode.scrollIntoView(true); currentRect = currentNode.getBoundingClientRect(); searchRect = search.getBoundingClientRect(); if (currentRect.top < (searchRect.top + searchRect.height)) { window.scrollBy(0, -(searchRect.top + searchRect.height + 5)); } } } counter.textContent = (state.isEmpty() ? 0 : state.idx + 1) + ' of ' + state.count(); } var search = doc.createElement('div'); search.className = 'sf-dump-search-wrapper sf-dump-search-hidden'; search.innerHTML = ' <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0<\/span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> '; root.insertBefore(search, root.firstChild); var state = new SearchState(); var searchInput = search.querySelector('.sf-dump-search-input'); var counter = search.querySelector('.sf-dump-search-count'); var searchInputTimer = 0; var previousSearchQuery = ''; addEventListener(searchInput, 'keyup', function (e) { var searchQuery = e.target.value; /* Don't perform anything if the pressed key didn't change the query */ if (searchQuery === previousSearchQuery) { return; } previousSearchQuery = searchQuery; clearTimeout(searchInputTimer); searchInputTimer = setTimeout(function () { state.reset(); collapseAll(root); resetHighlightedNodes(root); if ('' === searchQuery) { counter.textContent = '0 of 0'; return; } var classMatches = [ "sf-dump-str", "sf-dump-key", "sf-dump-public", "sf-dump-protected", "sf-dump-private", ].map(xpathHasClass).join(' or '); var xpathResult = doc.evaluate('.//span[' + classMatches + '][contains(translate(child::text(), ' + xpathString(searchQuery.toUpperCase()) + ', ' + xpathString(searchQuery.toLowerCase()) + '), ' + xpathString(searchQuery.toLowerCase()) + ')]', root, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null); while (node = xpathResult.iterateNext()) state.nodes.push(node); showCurrent(state); }, 400); }); Array.from(search.querySelectorAll('.sf-dump-search-input-next, .sf-dump-search-input-previous')).forEach(function (btn) { addEventListener(btn, 'click', function (e) { e.preventDefault(); -1 !== e.target.className.indexOf('next') ? state.next() : state.previous(); searchInput.focus(); collapseAll(root); showCurrent(state); }) }); addEventListener(root, 'keydown', function (e) { var isSearchActive = !/\bsf-dump-search-hidden\b/.test(search.className); if ((114 === e.keyCode && !isSearchActive) || (isCtrlKey(e) && 70 === e.keyCode)) { /* F3 or CMD/CTRL + F */ if (70 === e.keyCode && document.activeElement === searchInput) { /* * If CMD/CTRL + F is hit while having focus on search input, * the user probably meant to trigger browser search instead. * Let the browser execute its behavior: */ return; } e.preventDefault(); search.className = search.className.replace(/\bsf-dump-search-hidden\b/, ''); searchInput.focus(); } else if (isSearchActive) { if (27 === e.keyCode) { /* ESC key */ search.className += ' sf-dump-search-hidden'; e.preventDefault(); resetHighlightedNodes(root); searchInput.value = ''; } else if ( (isCtrlKey(e) && 71 === e.keyCode) /* CMD/CTRL + G */ || 13 === e.keyCode /* Enter */ || 114 === e.keyCode /* F3 */ ) { e.preventDefault(); e.shiftKey ? state.previous() : state.next(); collapseAll(root); showCurrent(state); } } }); } if (0 >= options.maxStringLength) { return; } try { elt = root.querySelectorAll('.sf-dump-str'); len = elt.length; i = 0; t = []; while (i < len) t.push(elt[i++]); len = t.length; for (i = 0; i < len; ++i) { elt = t[i]; s = elt.innerText || elt.textContent; x = s.length - options.maxStringLength; if (0 < x) { h = elt.innerHTML; elt[elt.innerText ? 'innerText' : 'textContent'] = s.substring(0, options.maxStringLength); elt.className += ' sf-dump-str-collapse'; elt.innerHTML = '<span class=sf-dump-str-collapse>'+h+'<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span>'+ '<span class=sf-dump-str-expand>'+elt.innerHTML+'<a class="sf-dump-ref sf-dump-str-toggle" title="'+x+' remaining characters"> ▶</a></span>'; } } } catch (e) { } }; })(document);
                Dropzone.autoDiscover = false;
                "use strict";
        </script>
        <style>
            .phpdebugbar pre.sf-dump .sf-dump-compact,
            .sf-dump-str-collapse .sf-dump-str-collapse,
            .sf-dump-str-expand .sf-dump-str-expand {
                display: none;
            }
        </style>
        <style></style>
        <style>
            .phpdebugbar pre.sf-dump {
                display: block;
                white-space: pre;
                padding: 5px;
                overflow: initial !important;
            }
            .phpdebugbar pre.sf-dump:after {
                content: "";
                visibility: hidden;
                display: block;
                height: 0;
                clear: both;
            }
            .phpdebugbar pre.sf-dump span {
                display: inline;
            }
            .phpdebugbar pre.sf-dump a {
                text-decoration: none;
                cursor: pointer;
                border: 0;
                outline: none;
                color: inherit;
            }
            .phpdebugbar pre.sf-dump img {
                max-width: 50em;
                max-height: 50em;
                margin: 0.5em 0 0 0;
                padding: 0;
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis {
                display: inline-block;
                overflow: visible;
                text-overflow: ellipsis;
                max-width: 5em;
                white-space: nowrap;
                overflow: hidden;
                vertical-align: top;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis + .sf-dump-ellipsis {
                max-width: none;
            }
            .phpdebugbar pre.sf-dump code {
                display: inline;
                padding: 0;
                background: none;
            }
            .sf-dump-public.sf-dump-highlight,
            .sf-dump-protected.sf-dump-highlight,
            .sf-dump-private.sf-dump-highlight,
            .sf-dump-str.sf-dump-highlight,
            .sf-dump-key.sf-dump-highlight {
                background: rgba(111, 172, 204, 0.3);
                border: 1px solid #7DA0B1;
                border-radius: 3px;
            }
            .sf-dump-public.sf-dump-highlight-active,
            .sf-dump-protected.sf-dump-highlight-active,
            .sf-dump-private.sf-dump-highlight-active,
            .sf-dump-str.sf-dump-highlight-active,
            .sf-dump-key.sf-dump-highlight-active {
                background: rgba(253, 175, 0, 0.4);
                border: 1px solid #ffa500;
                border-radius: 3px;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-hidden {
                display: none !important;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-wrapper {
                font-size: 0;
                white-space: nowrap;
                margin-bottom: 5px;
                display: flex;
                position: -webkit-sticky;
                position: sticky;
                top: 5px;
            }
            .phpdebugbar pre.sf-dump .sf-dump-search-wrapper > * {
                vertical-align: top;
                box-sizing: border-box;
                height: 21px;
                font-weight: normal;
                border-radius: 0;
                background: #FFF;
                color: #757575;
                border: 1px solid #BBB;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > input.sf-dump-search-input {
                padding: 3px;
                height: 21px;
                font-size: 12px;
                border-right: none;
                border-top-left-radius: 3px;
                border-bottom-left-radius: 3px;
                color: #000;
                min-width: 15px;
                width: 100%;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next,
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-previous {
                background: #F2F2F2;
                outline: none;
                border-left: none;
                font-size: 0;
                line-height: 0;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next {
                border-top-right-radius: 3px;
                border-bottom-right-radius: 3px;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-next
                > svg,
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-input-previous
                > svg {
                pointer-events: none;
                width: 12px;
                height: 12px;
            }
            .phpdebugbar
                pre.sf-dump
                .sf-dump-search-wrapper
                > .sf-dump-search-count {
                display: inline-block;
                padding: 0 5px;
                margin: 0;
                border-left: none;
                line-height: 21px;
                font-size: 12px;
            }
            .phpdebugbar pre.sf-dump,
            .phpdebugbar pre.sf-dump .sf-dump-default {
                word-wrap: break-word;
                white-space: pre-wrap;
                word-break: normal;
            }
            .phpdebugbar pre.sf-dump .sf-dump-num {
                font-weight: bold;
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-const {
                font-weight: bold;
            }
            .phpdebugbar pre.sf-dump .sf-dump-str {
                font-weight: bold;
                color: #3A9B26;
            }
            .phpdebugbar pre.sf-dump .sf-dump-note {
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ref {
                color: #7B7B7B;
            }
            .phpdebugbar pre.sf-dump .sf-dump-public {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-protected {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-private {
                color: #000000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-meta {
                color: #B729D9;
            }
            .phpdebugbar pre.sf-dump .sf-dump-key {
                color: #3A9B26;
            }
            .phpdebugbar pre.sf-dump .sf-dump-index {
                color: #1299DA;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis {
                color: #A0A000;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ns {
                user-select: none;
            }
            .phpdebugbar pre.sf-dump .sf-dump-ellipsis-note {
                color: #1299DA;
            }
            .dropzone {
                background: white;
                border-radius: 5px;
                height: 121px;
                border: 2px dashed #CBDFDF;
                border-image: none;
                min-height: 126px;
                margin-left: auto;
                margin-right: auto;
            }
            .dropzone .dz-preview {
                position: relative;
                display: inline-block;
                vertical-align: top;
                margin: 5px;
                min-height: 100px;
            }
            .dropzone .dz-preview .dz-image {
                border-radius: -51px;
                overflow: hidden;
                width: 64px;
                height: 63px;
                position: relative;
                display: list-item;
                z-index: 10;
                margin-left: 5px;
            }
            .dropzone .dz-preview .dz-details {
                z-index: 20;
                position: absolute;
                top: -3px;
                left: 0;
                opacity: 0;
                font-size: 11px !important;
                min-width: 100%;
                max-width: 100%;
                padding: 1em 1em;
                text-align: center;
                color: rgba(0,0,0,.9);
                line-height: 135%;
            }
            .dropzone .dz-preview .dz-progress {
                opacity: 0;
            }
            .dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark {
                pointer-events: none;
                opacity: 0;
                z-index: 391;
                position: absolute;
                display: block;
                top: 50%;
                left: 50%;
                margin-left: -27px;
                margin-top: -41px;
            }
        </style>
    </head>
    <body style="">
        <div class="preloader" style="opacity: 0; display: none">
            <div class="box-loader">
                <div class="loader animate">
                    <svg class="circular" viewBox="50 50 100 100">
                        <circle
                            class="path"
                            cx="75"
                            cy="75"
                            r="20"
                            fill="none"
                            stroke-width="3"
                            stroke-miterlimit="10"
                        ></circle>
                        <line
                            class="line"
                            x1="127"
                            x2="150"
                            y1="0"
                            y2="0"
                            stroke="black"
                            stroke-width="3"
                            stroke-linecap="round"
                        ></line>
                    </svg>
                </div>
            </div>
        </div>

        <header class="header-section">
            <div class="header">
                <div class="header-bottom-area">
                    <div class="container-fluid">
                        <div class="header-menu-content">
                            <nav class="navbar navbar-expand-lg p-0">
                                <a
                                    class="site-logo site-title"
                                    href="http://127.0.0.1:8000"
                                    ><img
                                        src="http://127.0.0.1:8000/assets/images/logoIcon/logo.svg"
                                        alt="DureForce"
                                /></a>
                                <button
                                    class="navbar-toggler ms-auto"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation"
                                >
                                    <span class="fas fa-bars"></span>
                                </button>
                                <button
                                    type="button"
                                    class="short-menu-open-btn"
                                >
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <div
                                    class="collapse navbar-collapse d-flex justify-content-between"
                                    id="navbarSupportedContent"
                                >
                                    <ul
                                        class="navbar-nav main-menu ms-auto me-auto"
                                    >
                                        <li>
                                            <a href="http://127.0.0.1:8000"
                                                >How it works</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="http://127.0.0.1:8000/service"
                                                >Services we offer</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="http://127.0.0.1:8000/software"
                                                >Pricing</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="http://127.0.0.1:8000/contact"
                                                >About us</a
                                            >
                                        </li>
                                    </ul>
                                    <div
                                        class="header-btn-container d-flex justify-content-between mx-2"
                                        style="
                                            width: 23%;
                                            justify-content: space-around !important;
                                        "
                                    >
                                        <a
                                            class="btn--post btn active mr-1 d-inline-block"
                                            href="http://127.0.0.1:8000/user/buyer/job/create"
                                            >Post a Job</a
                                        >
                                        <div class="search-main">
                                            <select
                                                class="search-select-header select2-hidden-accessible"
                                                data-select2-id="select2-data-1-swyh"
                                                tabindex="-1"
                                                aria-hidden="true"
                                            >
                                                <option
                                                    data-select2-id="select2-data-3-pl1n"
                                                ></option>
                                                <option
                                                    value="1"
                                                    data-select2-id="select2-data-2-dsbs"
                                                >
                                                    Hire professionals and
                                                    agencies Service
                                                </option>
                                                <option
                                                    value="2"
                                                    data-select2-id="select2-data-3-wyfv"
                                                >
                                                    Browse and buy Software
                                                </option>
                                                <option
                                                    value="3"
                                                    data-select2-id="select2-data-4-3kik"
                                                >
                                                    Apply to jobs posted by
                                                    clients
                                                </option></select
                                            ><span
                                                class="select2 select2-container select2-container--default"
                                                dir="ltr"
                                                data-select2-id="select2-data-1-v3mr"
                                                style="width: 1px"
                                                ><span class="selection"
                                                    ><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        tabindex="-1"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-sgg7-container"
                                                        ><span
                                                            class="select2-selection__rendered"
                                                            id="select2-sgg7-container"
                                                            role="textbox"
                                                            aria-readonly="true"
                                                            ><span
                                                                class="select2-selection__placeholder"
                                                                >Search</span
                                                            ></span
                                                        ><span
                                                            class="select2-selection__arrow"
                                                            role="presentation"
                                                            ><b
                                                                role="presentation"
                                                            ></b></span></span></span
                                                ><span
                                                    class="dropdown-wrapper"
                                                    aria-hidden="true"
                                                ></span></span
                                            ><span
                                                class="select2 select2-container select2-container--default"
                                                dir="ltr"
                                                data-select2-id="select2-data-1-9300"
                                                style="width: 1px"
                                                ><span class="selection"
                                                    ><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        tabindex="-1"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-1exc-container"
                                                        ><span
                                                            class="select2-selection__rendered"
                                                            id="select2-1exc-container"
                                                            role="textbox"
                                                            aria-readonly="true"
                                                            ><span
                                                                class="select2-selection__placeholder"
                                                                >Search</span
                                                            ></span
                                                        ><span
                                                            class="select2-selection__arrow"
                                                            role="presentation"
                                                            ><b
                                                                role="presentation"
                                                            ></b></span></span></span
                                                ><span
                                                    class="dropdown-wrapper"
                                                    aria-hidden="true"
                                                ></span></span
                                            ><span
                                                class="select2 select2-container select2-container--default"
                                                dir="ltr"
                                                data-select2-id="select2-data-2-4og8"
                                                style="width: 104px"
                                                ><span class="selection"
                                                    ><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        tabindex="0"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-ogxs-container"
                                                        ><span
                                                            class="select2-selection__rendered"
                                                            id="select2-ogxs-container"
                                                            role="textbox"
                                                            aria-readonly="true"
                                                            ><span
                                                                class="select2-selection__placeholder"
                                                                >Search</span
                                                            ></span
                                                        ><span
                                                            class="select2-selection__arrow"
                                                            role="presentation"
                                                            ><b
                                                                role="presentation"
                                                            ></b></span></span></span
                                                ><span
                                                    class="dropdown-wrapper"
                                                    aria-hidden="true"
                                                ></span
                                            ></span>
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>

                                    <div class="header-right header-action m-0">
                                        <div class="dropdown text-end">
                                            <a
                                                href="#"
                                                class="d-block link-dark text-decoration-none dropdown-toggle"
                                                id="dropdownUser1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="fa fa-user"></i>
                                                <span style="margin: 0 10 0 10"
                                                    >Shahzaib</span
                                                >
                                            </a>
                                            <ul
                                                class="dropdown-menu text-small"
                                                aria-labelledby="dropdownUser1"
                                                style=""
                                            >
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >New project...</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Settings</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Profile</a
                                                    >
                                                </li>
                                                <li>
                                                    <hr
                                                        class="dropdown-divider"
                                                    />
                                                </li>
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Sign out</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <style>
            .header-bottom-area
                .navbar-expand-lg
                .select2-container--default
                .select2-selection--single {
                border: 1px solid #7f007f;
                height: 39px;
                display: flex;
                align-items: center;
            }
        </style>
        <section
            class="account-section bg-overlay-white bg_img"
            style="background-image: url('undefined')"
        >
            <div class="container">
                <div id="viewport">
                    <div class="row justify-content-center">
                        <!-- Sidebar -->
                        <div class="side-nav col-12 col-md-4" id="sidebar">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="tab" class="active">
                                    <span class="">1</span>
                                    <a data-toggle="tab" href="#profile">
                                        Basic
                                    </a>
                                </li>
                                <li role="tab" class="underline {{ request()->get('view') === 'step-2' ? 'active' : '' }}">
                                    <span class="">2</span>
                                    <a
                                        data-toggle="tab"
                                        href="#profile2"
                                        class=""
                                    >
                                        Company
                                    </a>
                                </li>
                                <li role="tab" class="{{ request()->get('view') === 'step-3' ? 'active' : '' }}">
                                    <span class="">3</span>
                                    <a
                                        data-toggle="tab"
                                        href="#profile3"
                                        class=""
                                    >
                                        Payment Methods
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Content -->

                        <div class="col-12 col-md-8 p-0">
                            <div class="tab-content">
                                <input
                                    type="hidden"
                                    name="_token"
                                    value="bNpyRs3QyOnT5UorUY5izFnvouKTq47tM6AHF2tp"
                                />
                                <div
                                    id="profile"
                                    role="tabpanel"
                                    class="tab-pane active"
                                >
                                    <div class="setProfile" id="basic-profile">
                                        <form
                                            action="https://azapp-dureforce-dev.azurewebsites.net/user/seller/profile/save-basic"
                                            method="POST"
                                            id="form-basic-save"
                                            enctype="multipart/form-data"
                                        >
                                            <input
                                                type="hidden"
                                                name="_token"
                                                value="bNpyRs3QyOnT5UorUY5izFnvouKTq47tM6AHF2tp"
                                            />
                                            <div
                                                class="container-fluid welcome-body"
                                            >
                                                <h1 class="mb-4">
                                                    Welcome Muhammad Shahzaib
                                                </h1>
                                                <span class="cmnt pb-4">
                                                    Complete your profile to
                                                    join our global community of
                                                    freelancers and start
                                                    selling your service to
                                                    growing network of
                                                    businesses.</span
                                                >
                                                <div>
                                                    <label class="mt-4"
                                                        >Profile Picture 
                                                        <span class="imp"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <div class="col-xl-12 col-lg-12 form-group">
                                                    
                                                            <div id="dropzone">
                                                                <div class="dropzone needsclick" id="demo-upload" action="#" >
                                                                    <div class="fallback">
                                                                        <input name="file" type="file" multiple />
                                                                    </div>
                                                                    
                                                                    <div class="dz-message text-center mt-40"> 
                                                                        @lang('Drag or Drop to Upload')<br>   
                                                                        <span class="text text-primary ">
                                                                            @lang('Browse')  
                                                                            
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="mt-4"
                                                            >Job Title
                                                            <span class="imp"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            type="text"
                                                            name="designation"
                                                            placeholder="E.g. CEO, CTO, Manager Marketing"
                                                            value=""
                                                        />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="mt-4"
                                                            >About You
                                                            <span class="imp"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <textarea
                                                            cols="20"
                                                            rows="5"
                                                            name="about_me"
                                                            placeholder="Describe yourself to freelancers"
                                                        ></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="mt-4"
                                                            >Location
                                                            <span class="imp"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            type="text"
                                                            name="location"
                                                            value=""
                                                            placeholder="City, Country"
                                                        />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="mt-4"
                                                            >Phone</label
                                                        >
                                                        <input
                                                            type="number"
                                                            name="mobile"
                                                            placeholder=""
                                                            value=""
                                                        />
                                                    </div>
                                                    <div
                                                        class="language-container row"
                                                        id="language-row"
                                                        style="
                                                            justify-content: space-between !important;
                                                        "
                                                    >
                                                        <div
                                                            class="col-md-6 col-sm-12"
                                                        >
                                                            <label class="mt-4"
                                                                >Language
                                                                <span
                                                                    class="imp"
                                                                    >*</span
                                                                ></label
                                                            >
                                                            <select
                                                                name="languages[]"
                                                                class="form-control select-lang"
                                                                id=""
                                                            >
                                                                <option
                                                                    value=""
                                                                    selected=""
                                                                >
                                                                    Spoken
                                                                    Language(s)
                                                                </option>
                                                                <option
                                                                    value="1"
                                                                >
                                                                    English
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="col-md-6 col-sm-12"
                                                        >
                                                            <label class="mt-4"
                                                                >Profeciency
                                                                Level
                                                                <span
                                                                    class="imp"
                                                                    >*</span
                                                                ></label
                                                            >
                                                            <select
                                                                name="language_level[]"
                                                                class="form-control selected-level select-lang"
                                                                id=""
                                                            >
                                                                <option
                                                                    value=""
                                                                    selected=""
                                                                >
                                                                    My Level is
                                                                </option>
                                                                <option
                                                                    value="1"
                                                                >
                                                                    B1
                                                                    (Pre-Intermediate)
                                                                </option>
                                                                <option
                                                                    value="2"
                                                                >
                                                                    B2
                                                                    (Intermediate)
                                                                </option>
                                                                <option
                                                                    value="3"
                                                                >
                                                                    C1
                                                                    (Upper-Intermediate)
                                                                </option>
                                                                <option
                                                                    value="4"
                                                                >
                                                                    C2
                                                                    (Advanced)
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="my-2"
                                                        id="add-language"
                                                        onclick="addMoreLanguages()"
                                                    >
                                                        Add another
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="setProfile">
                                                <div class="col-md-12">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-continue m-0 btn-secondary"
                                                    >
                                                        Continue
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-section section--bg">
            <div class="container-fluid">
                <div class="footer-wrapper open">
                    <div
                        class="copyright-area d-flex flex-wrap justify-content-between align-items-center"
                    >
                        <div>
                            <figure>
                                <svg
                                    width="221"
                                    height="101"
                                    viewBox="0 0 221 101"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <rect
                                        width="221"
                                        height="101"
                                        fill="url(#pattern0)"
                                    ></rect>
                                    <defs>
                                        <pattern
                                            id="pattern0"
                                            patternContentUnits="objectBoundingBox"
                                            width="1"
                                            height="1"
                                        >
                                            <use
                                                xlink:href="#image0_1217_1502"
                                                transform="translate(0 -0.00172881) scale(0.00078125 0.00170947)"
                                            ></use>
                                        </pattern>
                                        <image
                                            id="image0_1217_1502"
                                            width="1280"
                                            height="587"
                                            xlink:href="data:image/png;base64,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AAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMRaLAGC91vgtEXFERPOa30trbe9s136b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AAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIwRAAQAAAAAAABijAAgAAAAAAAAEGMEAAEAAAAAAIAYIwAIAAAAAAAAxBgBQAAAAAAAACDGCAACAAAAAAAAMUYAEAAAAAAAAIgxAoAAAAAAAABAjBEABAAAAAAAAGKMACAAAAAAAAAQYwQAAQAAAAAAgBgjAAgAAAAAAADEGAFAAAAAAAAAIMYIAAIAAAAAAAAxRgAQAAAAAAAAiDECgAAAAAAAAECMEQAEAAAAAAAAYowAIAAAAAAAABBjBAABAAAAAACAGCMACAAAAAAAAMQYAUAAAAAAAAAgxggAAgAAAAAAADFGABAAAAAAAACIMQKAAAAAAAAAQIz9/wcA/qy7EJ5bvHkAAAAASUVORK5CYII="
                                        ></image>
                                    </defs>
                                </svg>
                            </figure>
                        </div>
                        <div class="copyright text-center">
                            <span class="powered-by-area text-white"
                                >Powered by getradgjof.is</span
                            >
                            <p>Copyright © 2022 All Rights reserved</p>
                        </div>

                        <div class="social-area">
                            <ul class="footer-social">
                                <li>
                                    <a
                                        href="http://worklink.com.pk/"
                                        target="__blank"
                                        ><i class="las la-headset pt-10"></i
                                    ></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com"
                                        target="__blank"
                                        ><i class="fab fa-instagram pt-10"></i
                                    ></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        target="__blank"
                                        ><i class="fab fa-linkedin-in pt-10"></i
                                    ></a>
                                </li>
                                <li>
                                    <a
                                        href="https://twitter.com/"
                                        target="__blank"
                                        ><i class="lab la-twitter pt-10"></i
                                    ></a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        target="__blank"
                                        ><i class="lab la-facebook-f pt-10"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div
            class="modal fade"
            id="cookieModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="cookieModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cookieModalLabel">
                            Cookie Policy
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <font color="#ffffff" face="Exo, sans-serif"
                            ><span style="font-size: 18px"
                                >We may use cookies or any other tracking
                                technologies when you visit our website,
                                including any other media form, mobile website,
                                or mobile application related or connected to
                                help customize the Site and improve your
                                experience.</span
                            ></font
                        ><br />
                        <a href="#" target="_blank">Read Policy</a>
                    </div>
                    <div class="modal-footer">
                        <a
                            href="http://127.0.0.1:8000/cookie/accept"
                            class="btn btn-primary"
                            >Accept</a
                        >
                    </div>
                </div>
            </div>
        </div>

        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/jquery-3.5.1.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/bootstrap.bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/swiper-bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/jquery-ui.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/chosen.jquery.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/wow.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/main.js"></script>
        <script src="http://127.0.0.1:8000/assets/templates/basic/frontend/js/select2.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/resources/js/general.js"></script>

        <script>
            'use strict';
            $(document).on('click', '.subscribe-btn', function() {
                var email = $("#emailSub").val();
                if (email) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk",
                        },
                        url: "http://127.0.0.1:8000/subscribe",
                        method: "POST",
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response.success) {
                                notify('success', response.success);
                            } else {
                                $.each(response, function(i, val) {
                                    notify('error', val);
                                });
                            }
                        }
                    });
                } else {
                    notify('error', "Please Input Your Email");
                }
            });
        </script>
        <link
            rel="stylesheet"
            href="http://127.0.0.1:8000/assets/global/css/iziToast.min.css"
        />
        <script src="http://127.0.0.1:8000/assets/global/js/iziToast.min.js"></script>

        <script>
            "use strict";
            function notify(status,message) {
                iziToast[status]({
                    message: message,
                    position: "topRight"
                });
            }
        </script>
        <script>
            (function ($) {
                "use strict";
                $(".langSel").on("change", function () {
                    window.location.href = "http://127.0.0.1:8000/change/" + $(this).val();
                });

                $(document).on("click", ".loveHeartAction", function () {
                    let id = $(this).data('serviceid');
                    $.ajax({
                        headers: {"X-CSRF-TOKEN": "spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk",},
                        url: "http://127.0.0.1:8000/user/seller/favorite/service",
                        method: "POST",
                        dataType: "json",
                        data: {id: id},
                        success: function (response) {
                            if (response.success) {
                                notify('success', response.success);
                            } else {
                                $.each(response, function (i, val) {
                                    notify('error', val);
                                });
                            }
                        }
                    });
                });


                $(document).on("click", ".loveHeartActionSoftware", function () {
                    let id = $(this).data('softwareid');
                    $.ajax({
                        headers: {"X-CSRF-TOKEN": "spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk",},
                        url: "http://127.0.0.1:8000/user/seller/favorite/software",
                        method: "POST",
                        dataType: "json",
                        data: {id: id},
                        success: function (response) {
                            if (response.success) {
                                notify('success', response.success);
                            } else {
                                $.each(response, function (i, val) {
                                    notify('error', val);
                                });
                            }
                        }
                    });
                });
            })(jQuery);
        </script>

        <style>
            .keyword-container .badge {
                color: #333746;
            }

            .keyword-container .badge:hover {
                color: #153dc7;
            }
        </style>
        <script type="text/javascript">
            var phpdebugbar = new PhpDebugBar.DebugBar();
            phpdebugbar.addIndicator("php_version", new PhpDebugBar.DebugBar.Indicator({"icon":"code","tooltip":"PHP Version"}), "right");
            phpdebugbar.addTab("messages", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Messages", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
            phpdebugbar.addIndicator("time", new PhpDebugBar.DebugBar.Indicator({"icon":"clock-o","tooltip":"Request Duration"}), "right");
            phpdebugbar.addTab("timeline", new PhpDebugBar.DebugBar.Tab({"icon":"tasks","title":"Timeline", "widget": new PhpDebugBar.Widgets.TimelineWidget()}));
            phpdebugbar.addIndicator("memory", new PhpDebugBar.DebugBar.Indicator({"icon":"cogs","tooltip":"Memory Usage"}), "right");
            phpdebugbar.addTab("exceptions", new PhpDebugBar.DebugBar.Tab({"icon":"bug","title":"Exceptions", "widget": new PhpDebugBar.Widgets.ExceptionsWidget()}));
            phpdebugbar.addTab("views", new PhpDebugBar.DebugBar.Tab({"icon":"leaf","title":"Views", "widget": new PhpDebugBar.Widgets.TemplatesWidget()}));
            phpdebugbar.addTab("route", new PhpDebugBar.DebugBar.Tab({"icon":"share","title":"Route", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.addIndicator("currentroute", new PhpDebugBar.DebugBar.Indicator({"icon":"share","tooltip":"Route"}), "right");
            phpdebugbar.addTab("queries", new PhpDebugBar.DebugBar.Tab({"icon":"database","title":"Queries", "widget": new PhpDebugBar.Widgets.LaravelSQLQueriesWidget()}));
            phpdebugbar.addTab("models", new PhpDebugBar.DebugBar.Tab({"icon":"cubes","title":"Models", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.addTab("emails", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Mails", "widget": new PhpDebugBar.Widgets.MailsWidget()}));
            phpdebugbar.addTab("gate", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Gate", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
            phpdebugbar.addTab("session", new PhpDebugBar.DebugBar.Tab({"icon":"archive","title":"Session", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
            phpdebugbar.addTab("request", new PhpDebugBar.DebugBar.Tab({"icon":"tags","title":"Request", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.setDataMap({
            "php_version": ["php.version", ],
            "messages": ["messages.messages", []],
            "messages:badge": ["messages.count", null],
            "time": ["time.duration_str", '0ms'],
            "timeline": ["time", {}],
            "memory": ["memory.peak_usage_str", '0B'],
            "exceptions": ["exceptions.exceptions", []],
            "exceptions:badge": ["exceptions.count", null],
            "views": ["views", []],
            "views:badge": ["views.nb_templates", 0],
            "route": ["route", {}],
            "currentroute": ["route.uri", ],
            "queries": ["queries", []],
            "queries:badge": ["queries.nb_statements", 0],
            "models": ["models.data", {}],
            "models:badge": ["models.count", 0],
            "emails": ["swiftmailer_mails.mails", []],
            "emails:badge": ["swiftmailer_mails.count", null],
            "gate": ["gate.messages", []],
            "gate:badge": ["gate.count", null],
            "session": ["session", {}],
            "request": ["request", {}]
            });
            phpdebugbar.restoreState();
            phpdebugbar.ajaxHandler = new PhpDebugBar.AjaxHandler(phpdebugbar, undefined, true);
            phpdebugbar.ajaxHandler.bindToFetch();
            phpdebugbar.ajaxHandler.bindToXHR();
            phpdebugbar.setOpenHandler(new PhpDebugBar.OpenHandler({"url":"http:\/\/127.0.0.1:8000\/_debugbar\/open"}));
            phpdebugbar.addDataSet({"__meta":{"id":"X01c8dd2eee9700c39b0e1246b21361ad","datetime":"2022-09-08 18:24:59","utime":1662661499.170664,"method":"GET","uri":"\/profile-design","ip":"127.0.0.1"},"php":{"version":"8.0.19","interface":"cli-server"},"messages":{"count":0,"messages":[]},"time":{"start":1662661498.860169,"end":1662661499.170684,"duration":0.3105151653289795,"duration_str":"311ms","measures":[{"label":"Booting","start":1662661498.860169,"relative_start":0,"end":1662661499.103343,"relative_end":1662661499.103343,"duration":0.24317407608032227,"duration_str":"243ms","params":[],"collector":null},{"label":"Application","start":1662661499.106332,"relative_start":0.24616312980651855,"end":1662661499.170687,"relative_end":2.86102294921875e-6,"duration":0.06435489654541016,"duration_str":"64.35ms","params":[],"collector":null}]},"memory":{"peak_usage":24520112,"peak_usage_str":"23MB"},"exceptions":{"count":0,"exceptions":[]},"views":{"nb_templates":6,"templates":[{"name":"templates.basic.project_profile.partials.profile_design (\\resources\\views\\templates\\basic\\project_profile\\partials\\profile_design.blade.php)","param_count":0,"params":[],"type":"blade"},{"name":"templates.basic.layouts.frontend (\\resources\\views\\templates\\basic\\layouts\\frontend.blade.php)","param_count":13,"params":["__env","app","paginator","general","activeTemplate","activeTemplateTrue","language","categorys","ranks","features","fservices","errors","content"],"type":"blade"},{"name":"templates.basic.partials.header (\\resources\\views\\templates\\basic\\partials\\header.blade.php)","param_count":13,"params":["__env","app","paginator","general","activeTemplate","activeTemplateTrue","language","categorys","ranks","features","fservices","errors","content"],"type":"blade"},{"name":"templates.basic.partials.footer (\\resources\\views\\templates\\basic\\partials\\footer.blade.php)","param_count":13,"params":["__env","app","paginator","general","activeTemplate","activeTemplateTrue","language","categorys","ranks","features","fservices","errors","content"],"type":"blade"},{"name":"partials.plugins (\\resources\\views\\partials\\plugins.blade.php)","param_count":14,"params":["__env","app","paginator","general","activeTemplate","activeTemplateTrue","language","categorys","ranks","features","fservices","errors","content","cookie"],"type":"blade"},{"name":"partials.notify (\\resources\\views\\partials\\notify.blade.php)","param_count":14,"params":["__env","app","paginator","general","activeTemplate","activeTemplateTrue","language","categorys","ranks","features","fservices","errors","content","cookie"],"type":"blade"}]},"route":{"uri":"GET profile-design","middleware":"web","uses":"\\Illuminate\\Routing\\ViewController@__invoke","controller":"\\Illuminate\\Routing\\ViewController","namespace":"App\\Http\\Controllers","prefix":"","where":[]},"queries":{"nb_statements":8,"nb_failed_statements":0,"accumulated_duration":0.00348,"accumulated_duration_str":"3.48ms","statements":[{"sql":"select * from `frontends` where `data_keys` = 'breadcrumbs.content' order by `id` desc limit 1","type":"query","params":[],"bindings":["breadcrumbs.content"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":null,"name":"\\app\\Http\\Helpers\\helpers.php","line":958},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":20,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":21,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00062,"duration_str":"620\u03bcs","stmt_id":"\\app\\Http\\Helpers\\helpers.php:958","connection":"dureforcedb","start_percent":0,"width_percent":17.816},{"sql":"select * from `frontends` where `data_keys` = 'footer.content' order by `id` desc limit 1","type":"query","params":[],"bindings":["footer.content"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":null,"name":"\\app\\Http\\Helpers\\helpers.php","line":958},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":20,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":21,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00051,"duration_str":"510\u03bcs","stmt_id":"\\app\\Http\\Helpers\\helpers.php:958","connection":"dureforcedb","start_percent":17.816,"width_percent":14.655},{"sql":"select * from `frontends` where `data_keys` = 'footer.element' order by `id` desc","type":"query","params":[],"bindings":["footer.element"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":null,"name":"\\app\\Http\\Helpers\\helpers.php","line":967},{"index":17,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00046,"duration_str":"460\u03bcs","stmt_id":"\\app\\Http\\Helpers\\helpers.php:967","connection":"dureforcedb","start_percent":32.471,"width_percent":13.218},{"sql":"select * from `frontends` where `data_keys` = 'social_icon.element' order by `id` desc","type":"query","params":[],"bindings":["social_icon.element"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":null,"name":"\\app\\Http\\Helpers\\helpers.php","line":967},{"index":17,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00038,"duration_str":"380\u03bcs","stmt_id":"\\app\\Http\\Helpers\\helpers.php:967","connection":"dureforcedb","start_percent":45.69,"width_percent":10.92},{"sql":"select * from `categories` where `type_id` = 1 and `status` = 1","type":"query","params":[],"bindings":["1","1"],"hints":null,"show_copy":false,"backtrace":[{"index":14,"namespace":null,"name":"\\app\\Models\\Category.php","line":30},{"index":15,"namespace":"view","name":"f4ac9bc1a48b2ad85730bb6a09e25989b17b634f","line":47},{"index":17,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61}],"duration":0.00035999999999999997,"duration_str":"360\u03bcs","stmt_id":"\\app\\Models\\Category.php:30","connection":"dureforcedb","start_percent":56.609,"width_percent":10.345},{"sql":"select * from `frontends` where `data_keys` = 'cookie.data' limit 1","type":"query","params":[],"bindings":["cookie.data"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":"view","name":"900120ab669d9cbf56e48909dea22d2b8722f583","line":57},{"index":17,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":20,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00035999999999999997,"duration_str":"360\u03bcs","stmt_id":"view::900120ab669d9cbf56e48909dea22d2b8722f583:57","connection":"dureforcedb","start_percent":66.954,"width_percent":10.345},{"sql":"select * from `extensions` where `act` = 'tawk-chat' and `status` = 1 limit 1","type":"query","params":[],"bindings":["tawk-chat","1"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":null,"name":"\\app\\Http\\Helpers\\helpers.php","line":289},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":20,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":21,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00041999999999999996,"duration_str":"420\u03bcs","stmt_id":"\\app\\Http\\Helpers\\helpers.php:289","connection":"dureforcedb","start_percent":77.299,"width_percent":12.069},{"sql":"select * from `extensions` where `act` = 'google-analytics' and `status` = 1 limit 1","type":"query","params":[],"bindings":["google-analytics","1"],"hints":null,"show_copy":false,"backtrace":[{"index":15,"namespace":null,"name":"\\app\\Http\\Helpers\\helpers.php","line":283},{"index":18,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php","line":108},{"index":19,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php","line":58},{"index":20,"namespace":null,"name":"\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php","line":61},{"index":21,"namespace":null,"name":"\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php","line":37}],"duration":0.00037,"duration_str":"370\u03bcs","stmt_id":"\\app\\Http\\Helpers\\helpers.php:283","connection":"dureforcedb","start_percent":89.368,"width_percent":10.632}]},"models":{"data":{"App\\Models\\Category":7,"App\\Models\\Frontend":13},"count":20},"swiftmailer_mails":{"count":0,"mails":[]},"gate":{"count":0,"messages":[]},"session":{"_token":"spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk","lang":"en","_previous":"array:1 [\n  \"url\" => \"http:\/\/127.0.0.1:8000\/profile-design\"\n]","_flash":"array:2 [\n  \"old\" => []\n  \"new\" => []\n]","url":"array:1 [\n  \"intended\" => \"http:\/\/127.0.0.1:8000\/email\/verify\"\n]","PHPDEBUGBAR_STACK_DATA":"[]"},"request":{"path_info":"\/profile-design","status_code":"<pre class=sf-dump id=sf-dump-165462607 data-indent-pad=\"  \"><span class=sf-dump-num>200<\/span>\n<\/pre><script>Sfdump(\"sf-dump-165462607\", {\"maxDepth\":0})<\/script>\n","status_text":"OK","format":"html","content_type":"text\/html; charset=UTF-8","request_query":"<pre class=sf-dump id=sf-dump-593523815 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-593523815\", {\"maxDepth\":0})<\/script>\n","request_request":"<pre class=sf-dump id=sf-dump-1301173983 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-1301173983\", {\"maxDepth\":0})<\/script>\n","request_headers":"<pre class=sf-dump id=sf-dump-1454422463 data-indent-pad=\"  \"><span class=sf-dump-note>array:15<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>host<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"14 characters\">127.0.0.1:8000<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>connection<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"64 characters\">&quot;Google Chrome&quot;;v=&quot;105&quot;, &quot;Not)A;Brand&quot;;v=&quot;8&quot;, &quot;Chromium&quot;;v=&quot;105&quot;<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua-mobile<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"2 characters\">?0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua-platform<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"9 characters\">&quot;Windows&quot;<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>upgrade-insecure-requests<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str>1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>user-agent<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"111 characters\">Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/105.0.0.0 Safari\/537.36<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.9<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-site<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"4 characters\">none<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-mode<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">navigate<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-user<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"2 characters\">?1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-dest<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">document<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-encoding<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">gzip, deflate, br<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-language<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"26 characters\">en-GB,en-US;q=0.9,en;q=0.8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>cookie<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"713 characters\">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1454422463\", {\"maxDepth\":0})<\/script>\n","request_server":"<pre class=sf-dump id=sf-dump-1372503523 data-indent-pad=\"  \"><span class=sf-dump-note>array:31<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">D:\\xampp\\htdocs\\dureforce<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_PORT<\/span>\" => \"<span class=sf-dump-str title=\"5 characters\">59141<\/span>\"\n  \"<span class=sf-dump-key>SERVER_SOFTWARE<\/span>\" => \"<span class=sf-dump-str title=\"29 characters\">PHP 8.0.19 Development Server<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PROTOCOL<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">HTTP\/1.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_NAME<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PORT<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">8000<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_URI<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_METHOD<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">GET<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_NAME<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_FILENAME<\/span>\" => \"<span class=sf-dump-str title=\"35 characters\">D:\\xampp\\htdocs\\dureforce\\index.php<\/span>\"\n  \"<span class=sf-dump-key>PATH_INFO<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>PHP_SELF<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">\/index.php\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>HTTP_HOST<\/span>\" => \"<span class=sf-dump-str title=\"14 characters\">127.0.0.1:8000<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CONNECTION<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA<\/span>\" => \"<span class=sf-dump-str title=\"64 characters\">&quot;Google Chrome&quot;;v=&quot;105&quot;, &quot;Not)A;Brand&quot;;v=&quot;8&quot;, &quot;Chromium&quot;;v=&quot;105&quot;<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA_MOBILE<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">?0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA_PLATFORM<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">&quot;Windows&quot;<\/span>\"\n  \"<span class=sf-dump-key>HTTP_UPGRADE_INSECURE_REQUESTS<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_USER_AGENT<\/span>\" => \"<span class=sf-dump-str title=\"111 characters\">Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/105.0.0.0 Safari\/537.36<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT<\/span>\" => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.9<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_SITE<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">none<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_MODE<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">navigate<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_USER<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">?1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_DEST<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">document<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_ENCODING<\/span>\" => \"<span class=sf-dump-str title=\"17 characters\">gzip, deflate, br<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_LANGUAGE<\/span>\" => \"<span class=sf-dump-str title=\"26 characters\">en-GB,en-US;q=0.9,en;q=0.8<\/span>\"\n  \"<span class=sf-dump-key>HTTP_COOKIE<\/span>\" => \"<span class=sf-dump-str title=\"713 characters\">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_TIME_FLOAT<\/span>\" => <span class=sf-dump-num>1662661498.8602<\/span>\n  \"<span class=sf-dump-key>REQUEST_TIME<\/span>\" => <span class=sf-dump-num>1662661498<\/span>\n  \"<span class=sf-dump-key>HTTPS<\/span>\" => <span class=sf-dump-const>false<\/span>\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1372503523\", {\"maxDepth\":0})<\/script>\n","request_cookies":"<pre class=sf-dump id=sf-dump-1043988362 data-indent-pad=\"  \"><span class=sf-dump-note>array:2<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>XSRF-TOKEN<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk<\/span>\"\n  \"<span class=sf-dump-key>laravel_session<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1043988362\", {\"maxDepth\":0})<\/script>\n","response_headers":"<pre class=sf-dump id=sf-dump-1039231425 data-indent-pad=\"  \"><span class=sf-dump-note>array:5<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">no-cache, private<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>date<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"29 characters\">Thu, 08 Sep 2022 18:24:59 GMT<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>content-type<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"24 characters\">text\/html; charset=UTF-8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>set-cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"428 characters\">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=\/; samesite=lax<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"443 characters\">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=\/; httponly; samesite=lax<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>Set-Cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"400 characters\">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=\/<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"415 characters\">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=\/; httponly<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1039231425\", {\"maxDepth\":0})<\/script>\n","session_attributes":"<pre class=sf-dump id=sf-dump-1744438111 data-indent-pad=\"  \"><span class=sf-dump-note>array:6<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>_token<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk<\/span>\"\n  \"<span class=sf-dump-key>lang<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">en<\/span>\"\n  \"<span class=sf-dump-key>_previous<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>url<\/span>\" => \"<span class=sf-dump-str title=\"36 characters\">http:\/\/127.0.0.1:8000\/profile-design<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>_flash<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>old<\/span>\" => []\n    \"<span class=sf-dump-key>new<\/span>\" => []\n  <\/samp>]\n  \"<span class=sf-dump-key>url<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>intended<\/span>\" => \"<span class=sf-dump-str title=\"34 characters\">http:\/\/127.0.0.1:8000\/email\/verify<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>PHPDEBUGBAR_STACK_DATA<\/span>\" => []\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1744438111\", {\"maxDepth\":0})<\/script>\n"}}, "X01c8dd2eee9700c39b0e1246b21361ad");
        </script>
        <div class="phpdebugbar phpdebugbar-minimized phpdebugbar-closed">
            <div class="phpdebugbar-drag-capture"></div>
            <div class="phpdebugbar-resize-handle" style="display: none"></div>
            <div class="phpdebugbar-header" style="display: none">
                <div class="phpdebugbar-header-left">
                    <a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Messages</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i
                        ><span class="phpdebugbar-text">Timeline</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-bug"></i
                        ><span class="phpdebugbar-text">Exceptions</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-leaf"></i
                        ><span class="phpdebugbar-text">Views</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >6</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">Route</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-database"></i
                        ><span class="phpdebugbar-text">Queries</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >8</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cubes"></i
                        ><span class="phpdebugbar-text">Models</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >20</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-inbox"></i
                        ><span class="phpdebugbar-text">Mails</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Gate</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-archive"></i
                        ><span class="phpdebugbar-text">Session</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tags"></i
                        ><span class="phpdebugbar-text">Request</span
                        ><span class="phpdebugbar-badge"></span
                    ></a>
                </div>
                <div class="phpdebugbar-header-right">
                    <a class="phpdebugbar-close-btn"></a
                    ><a class="phpdebugbar-minimize-btn"></a
                    ><a class="phpdebugbar-maximize-btn"></a
                    ><a class="phpdebugbar-open-btn" style=""></a
                    ><select class="phpdebugbar-datasets-switcher">
                        <option value="X01c8dd2eee9700c39b0e1246b21361ad">
                            #1 profile-design (18:24:59)
                        </option></select
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-code"></i
                        ><span class="phpdebugbar-text">8.0.19</span
                        ><span class="phpdebugbar-tooltip"
                            >PHP Version</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-clock-o"></i
                        ><span class="phpdebugbar-text">311ms</span
                        ><span class="phpdebugbar-tooltip"
                            >Request Duration</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i
                        ><span class="phpdebugbar-text">23MB</span
                        ><span class="phpdebugbar-tooltip"
                            >Memory Usage</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">GET profile-design</span
                        ><span class="phpdebugbar-tooltip">Route</span></span
                    >
                </div>
            </div>
            <div class="phpdebugbar-body" style="height: 40px; display: none">
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <ul class="phpdebugbar-widgets-timeline">
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 0%; width: 78.31%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Booting (243ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 79.28%; width: 20.72%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Application (64.35ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <table
                                style="display: table; border: 0; width: 99%"
                                class="phpdebugbar-widgets-params"
                            >
                                <tr>
                                    <td class="phpdebugbar-widgets-name">
                                        1 x Booting (78.31%)
                                    </td>
                                    <td class="phpdebugbar-widgets-value">
                                        <div
                                            class="phpdebugbar-widgets-measure"
                                        >
                                            <span
                                                class="phpdebugbar-widgets-value"
                                                style="width: 78.31%"
                                            ></span
                                            ><span
                                                class="phpdebugbar-widgets-label"
                                                >243.17ms</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="phpdebugbar-widgets-name">
                                        1 x Application (20.73%)
                                    </td>
                                    <td class="phpdebugbar-widgets-value">
                                        <div
                                            class="phpdebugbar-widgets-measure"
                                        >
                                            <span
                                                class="phpdebugbar-widgets-value"
                                                style="width: 20.73%"
                                            ></span
                                            ><span
                                                class="phpdebugbar-widgets-label"
                                                >64.35ms</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-exceptions">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-templates">
                        <div class="phpdebugbar-widgets-status">
                            <span>6 templates were rendered</span>
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li class="phpdebugbar-widgets-list-item">
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.project_profile.partials.profile_design
                                    (\resources\views\templates\basic\project_profile\partials\profile_design.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >0</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.layouts.frontend
                                    (\resources\views\templates\basic\layouts\frontend.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.partials.header
                                    (\resources\views\templates\basic\partials\header.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.partials.footer
                                    (\resources\views\templates\basic\partials\footer.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >partials.plugins
                                    (\resources\views\partials\plugins.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >14</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                13
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>cookie</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >partials.notify
                                    (\resources\views\partials\notify.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >14</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                13
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>cookie</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                        <div class="phpdebugbar-widgets-callgraph"></div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uri">uri</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            GET profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="middleware">middleware</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">web</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uses">uses</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController@__invoke
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="controller">controller</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="namespace">namespace</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            App\Http\Controllers
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="prefix">prefix</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="where">where</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-sqlqueries">
                        <div class="phpdebugbar-widgets-status">
                            <span>8 statements were executed</span
                            ><span
                                title="Accumulated duration"
                                class="phpdebugbar-widgets-duration"
                                >3.48ms</span
                            >
                        </div>
                        <div class="phpdebugbar-widgets-toolbar">
                            <a
                                class="phpdebugbar-widgets-filter"
                                rel="dureforcedb"
                                >dureforcedb</a
                            >
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'breadcrumbs.content'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword">desc</span>
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 0%; width: 17.816%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >620μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:958</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;breadcrumbs.content
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:958</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'footer.content'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword">desc</span>
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 17.816%; width: 14.655%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >510μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:958</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;footer.content
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:958</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'footer.element'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword"
                                            >desc</span
                                        ></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 32.471%; width: 13.218%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >460μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:967</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;footer.element
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:967</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'social_icon.element'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword"
                                            >desc</span
                                        ></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 45.69%; width: 10.92%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >380μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:967</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;social_icon.element
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:967</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`categories`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`type_id`</span
                                        >
                                        = <span class="hljs-number">1</span>
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 56.609%; width: 10.345%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >360μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Models\Category.php:30</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;1
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Models\Category.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:30</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;view::f4ac9bc1a48b2ad85730bb6a09e25989b17b634f<span
                                                            class="phpdebugbar-text-muted"
                                                            >:47</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'cookie.data'</span
                                        >
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 66.954%; width: 10.345%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >360μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >view::900120ab669d9cbf56e48909dea22d2b8722f583:57</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;cookie.data
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;view::900120ab669d9cbf56e48909dea22d2b8722f583<span
                                                            class="phpdebugbar-text-muted"
                                                            >:57</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`extensions`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string">`act`</span> =
                                        <span class="hljs-string"
                                            >'tawk-chat'</span
                                        >
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span> limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 77.299%; width: 12.069%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >420μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:289</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;tawk-chat
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:289</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`extensions`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string">`act`</span> =
                                        <span class="hljs-string"
                                            >'google-analytics'</span
                                        >
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span> limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 89.368%; width: 10.632%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >370μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:283</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;google-analytics
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:283</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="App\Models\Category"
                                >App\Models\Category</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">7</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="App\Models\Frontend"
                                >App\Models\Frontend</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">13</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-mails">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-varlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_token">_token</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="lang">lang</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">en</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_previous">_previous</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "url" =&gt;
                            "http://127.0.0.1:8000/profile-design" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_flash">_flash</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:2 [ "old" =&gt; [] "new" =&gt; [] ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="url">url</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "intended" =&gt;
                            "http://127.0.0.1:8000/email/verify" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="PHPDEBUGBAR_STACK_DATA"
                                >PHPDEBUGBAR_STACK_DATA</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">[]</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="path_info">path_info</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            /profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_code">status_code</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-165462607"
                                data-indent-pad="  "
                            ><span class="sf-dump-num">200</span>
</pre>
                            <script>
                                Sfdump("sf-dump-165462607", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_text">status_text</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">OK</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="format">format</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">html</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="content_type">content_type</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            text/html; charset=UTF-8
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_query">request_query</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-593523815"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-593523815", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_request">request_request</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1301173983"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1301173983", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_headers">request_headers</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1454422463"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:15</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">host</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  </samp>]
  "<span class="sf-dump-key">connection</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-mobile</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-platform</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  </samp>]
  "<span class="sf-dump-key">upgrade-insecure-requests</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str">1</span>"
  </samp>]
  "<span class="sf-dump-key">user-agent</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  </samp>]
  "<span class="sf-dump-key">accept</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-site</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-mode</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-user</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-dest</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  </samp>]
  "<span class="sf-dump-key">accept-encoding</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  </samp>]
  "<span class="sf-dump-key">accept-language</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  </samp>]
  "<span class="sf-dump-key">cookie</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="717 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="881 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1454422463", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_server">request_server</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1372503523"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:31</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">DOCUMENT_ROOT</span>" =&gt; "<span class="sf-dump-str" title="25 characters">D:\xampp\htdocs\dureforce</span>"
  "<span class="sf-dump-key">REMOTE_ADDR</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">REMOTE_PORT</span>" =&gt; "<span class="sf-dump-str" title="5 characters">59141</span>"
  "<span class="sf-dump-key">SERVER_SOFTWARE</span>" =&gt; "<span class="sf-dump-str" title="29 characters">PHP 8.0.19 Development Server</span>"
  "<span class="sf-dump-key">SERVER_PROTOCOL</span>" =&gt; "<span class="sf-dump-str" title="8 characters">HTTP/1.1</span>"
  "<span class="sf-dump-key">SERVER_NAME</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">SERVER_PORT</span>" =&gt; "<span class="sf-dump-str" title="4 characters">8000</span>"
  "<span class="sf-dump-key">REQUEST_URI</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">REQUEST_METHOD</span>" =&gt; "<span class="sf-dump-str" title="3 characters">GET</span>"
  "<span class="sf-dump-key">SCRIPT_NAME</span>" =&gt; "<span class="sf-dump-str" title="10 characters">/index.php</span>"
  "<span class="sf-dump-key">SCRIPT_FILENAME</span>" =&gt; "<span class="sf-dump-str" title="35 characters">D:\xampp\htdocs\dureforce\index.php</span>"
  "<span class="sf-dump-key">PATH_INFO</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">PHP_SELF</span>" =&gt; "<span class="sf-dump-str" title="25 characters">/index.php/profile-design</span>"
  "<span class="sf-dump-key">HTTP_HOST</span>" =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  "<span class="sf-dump-key">HTTP_CONNECTION</span>" =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA</span>" =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_MOBILE</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_PLATFORM</span>" =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  "<span class="sf-dump-key">HTTP_UPGRADE_INSECURE_REQUESTS</span>" =&gt; "<span class="sf-dump-str">1</span>"
  "<span class="sf-dump-key">HTTP_USER_AGENT</span>" =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT</span>" =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_SITE</span>" =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_MODE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_USER</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_DEST</span>" =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_ENCODING</span>" =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_LANGUAGE</span>" =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  "<span class="sf-dump-key">HTTP_COOKIE</span>" =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="717 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="881 remaining characters"> ▶</a></span></span>"
  "<span class="sf-dump-key">REQUEST_TIME_FLOAT</span>" =&gt; <span class="sf-dump-num">1662661498.8602</span>
  "<span class="sf-dump-key">REQUEST_TIME</span>" =&gt; <span class="sf-dump-num">1662661498</span>
  "<span class="sf-dump-key">HTTPS</span>" =&gt; <span class="sf-dump-const">false</span>
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1372503523", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_cookies">request_cookies</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1043988362"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">XSRF-TOKEN</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">laravel_session</span>" =&gt; "<span class="sf-dump-str" title="40 characters">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V</span>"
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1043988362", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="response_headers"
                                >response_headers</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1039231425"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:5</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">no-cache, private</span>"
  </samp>]
  "<span class="sf-dump-key">date</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="29 characters">Thu, 08 Sep 2022 18:24:59 GMT</span>"
  </samp>]
  "<span class="sf-dump-key">content-type</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="24 characters">text/html; charset=UTF-8</span>"
  </samp>]
  "<span class="sf-dump-key">set-cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse sf-dump-str-collapse" title="428 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=/; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="268 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="432 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="596 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse sf-dump-str-collapse" title="443 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="283 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="447 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="611 remaining characters"> ▶</a></span></span>"
  </samp>]
  "<span class="sf-dump-key">Set-Cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse sf-dump-str-collapse" title="400 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=/<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="240 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="404 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="568 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse sf-dump-str-collapse" title="415 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=/; httponly<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="255 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="419 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="583 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1039231425", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="session_attributes"
                                >session_attributes</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1744438111"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:6</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">_token</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">lang</span>" =&gt; "<span class="sf-dump-str" title="2 characters">en</span>"
  "<span class="sf-dump-key">_previous</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">url</span>" =&gt; "<span class="sf-dump-str" title="36 characters">http://127.0.0.1:8000/profile-design</span>"
  </samp>]
  "<span class="sf-dump-key">_flash</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">old</span>" =&gt; []
    "<span class="sf-dump-key">new</span>" =&gt; []
  </samp>]
  "<span class="sf-dump-key">url</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">intended</span>" =&gt; "<span class="sf-dump-str" title="34 characters">http://127.0.0.1:8000/email/verify</span>"
  </samp>]
  "<span class="sf-dump-key">PHPDEBUGBAR_STACK_DATA</span>" =&gt; []
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1744438111", {"maxDepth":0})
                            </script>
                        </dd>
                    </dl>
                </div>
            </div>
            <a class="phpdebugbar-restore-btn" style=""></a>
        </div>
        <div class="phpdebugbar-openhandler" style="display: none">
            <div class="phpdebugbar-openhandler-header">
                PHP DebugBar | Open<a
                    ><i class="phpdebugbar-fa phpdebugbar-fa-times"></i
                ></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="150">Date</th>
                        <th width="55">Method</th>
                        <th>URL</th>
                        <th width="125">IP</th>
                        <th width="100">Filter data</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="phpdebugbar-openhandler-actions">
                <a>Load more</a><a>Show only current URL</a><a>Show all</a
                ><a>Delete all</a>
                <form>
                    <br /><b>Filter results</b><br />Method:
                    <select name="method">
                        <option></option>
                        <option>GET</option>
                        <option>POST</option>
                        <option>PUT</option>
                        <option>DELETE</option></select
                    ><br />Uri: <input type="text" name="uri" /><br />IP:
                    <input type="text" name="ip" /><br /><button type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div
            class="phpdebugbar-openhandler-overlay"
            style="display: none"
        ></div>
        <div class="phpdebugbar phpdebugbar-minimized phpdebugbar-closed">
            <div class="phpdebugbar-drag-capture"></div>
            <div class="phpdebugbar-resize-handle" style="display: none"></div>
            <div class="phpdebugbar-header" style="display: none">
                <div class="phpdebugbar-header-left">
                    <a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Messages</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i
                        ><span class="phpdebugbar-text">Timeline</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-bug"></i
                        ><span class="phpdebugbar-text">Exceptions</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-leaf"></i
                        ><span class="phpdebugbar-text">Views</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >6</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">Route</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-database"></i
                        ><span class="phpdebugbar-text">Queries</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >8</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cubes"></i
                        ><span class="phpdebugbar-text">Models</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >20</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-inbox"></i
                        ><span class="phpdebugbar-text">Mails</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Gate</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-archive"></i
                        ><span class="phpdebugbar-text">Session</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tags"></i
                        ><span class="phpdebugbar-text">Request</span
                        ><span class="phpdebugbar-badge"></span
                    ></a>
                </div>
                <div class="phpdebugbar-header-right">
                    <a class="phpdebugbar-close-btn"></a
                    ><a class="phpdebugbar-minimize-btn"></a
                    ><a class="phpdebugbar-maximize-btn"></a
                    ><a class="phpdebugbar-open-btn" style=""></a
                    ><select class="phpdebugbar-datasets-switcher">
                        <option value="X01c8dd2eee9700c39b0e1246b21361ad">
                            #1 profile-design (18:24:59)
                        </option></select
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-code"></i
                        ><span class="phpdebugbar-text">8.0.19</span
                        ><span class="phpdebugbar-tooltip"
                            >PHP Version</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-clock-o"></i
                        ><span class="phpdebugbar-text">311ms</span
                        ><span class="phpdebugbar-tooltip"
                            >Request Duration</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i
                        ><span class="phpdebugbar-text">23MB</span
                        ><span class="phpdebugbar-tooltip"
                            >Memory Usage</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">GET profile-design</span
                        ><span class="phpdebugbar-tooltip">Route</span></span
                    >
                </div>
            </div>
            <div class="phpdebugbar-body" style="height: 40px; display: none">
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <ul class="phpdebugbar-widgets-timeline">
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 0%; width: 78.31%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Booting (243ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 79.28%; width: 20.72%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Application (64.35ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <table
                                style="display: table; border: 0; width: 99%"
                                class="phpdebugbar-widgets-params"
                            >
                                <tbody>
                                    <tr>
                                        <td class="phpdebugbar-widgets-name">
                                            1 x Booting (78.31%)
                                        </td>
                                        <td class="phpdebugbar-widgets-value">
                                            <div
                                                class="phpdebugbar-widgets-measure"
                                            >
                                                <span
                                                    class="phpdebugbar-widgets-value"
                                                    style="width: 78.31%"
                                                ></span
                                                ><span
                                                    class="phpdebugbar-widgets-label"
                                                    >243.17ms</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="phpdebugbar-widgets-name">
                                            1 x Application (20.73%)
                                        </td>
                                        <td class="phpdebugbar-widgets-value">
                                            <div
                                                class="phpdebugbar-widgets-measure"
                                            >
                                                <span
                                                    class="phpdebugbar-widgets-value"
                                                    style="width: 20.73%"
                                                ></span
                                                ><span
                                                    class="phpdebugbar-widgets-label"
                                                    >64.35ms</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-exceptions">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-templates">
                        <div class="phpdebugbar-widgets-status">
                            <span>6 templates were rendered</span>
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li class="phpdebugbar-widgets-list-item">
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.project_profile.partials.profile_design
                                    (\resources\views\templates\basic\project_profile\partials\profile_design.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >0</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.layouts.frontend
                                    (\resources\views\templates\basic\layouts\frontend.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.partials.header
                                    (\resources\views\templates\basic\partials\header.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.partials.footer
                                    (\resources\views\templates\basic\partials\footer.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >partials.plugins
                                    (\resources\views\partials\plugins.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >14</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                13
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>cookie</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >partials.notify
                                    (\resources\views\partials\notify.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >14</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                13
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>cookie</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                        <div class="phpdebugbar-widgets-callgraph"></div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uri">uri</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            GET profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="middleware">middleware</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">web</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uses">uses</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController@__invoke
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="controller">controller</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="namespace">namespace</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            App\Http\Controllers
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="prefix">prefix</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="where">where</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-sqlqueries">
                        <div class="phpdebugbar-widgets-status">
                            <span>8 statements were executed</span
                            ><span
                                title="Accumulated duration"
                                class="phpdebugbar-widgets-duration"
                                >3.48ms</span
                            >
                        </div>
                        <div class="phpdebugbar-widgets-toolbar">
                            <a
                                class="phpdebugbar-widgets-filter"
                                rel="dureforcedb"
                                >dureforcedb</a
                            >
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'breadcrumbs.content'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword">desc</span>
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 0%; width: 17.816%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >620μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:958</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;breadcrumbs.content
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:958</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'footer.content'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword">desc</span>
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 17.816%; width: 14.655%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >510μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:958</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;footer.content
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:958</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'footer.element'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword"
                                            >desc</span
                                        ></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 32.471%; width: 13.218%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >460μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:967</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;footer.element
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:967</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'social_icon.element'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword"
                                            >desc</span
                                        ></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 45.69%; width: 10.92%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >380μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:967</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;social_icon.element
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:967</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`categories`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`type_id`</span
                                        >
                                        = <span class="hljs-number">1</span>
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 56.609%; width: 10.345%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >360μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Models\Category.php:30</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;1
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Models\Category.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:30</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;view::f4ac9bc1a48b2ad85730bb6a09e25989b17b634f<span
                                                            class="phpdebugbar-text-muted"
                                                            >:47</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'cookie.data'</span
                                        >
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 66.954%; width: 10.345%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >360μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >view::900120ab669d9cbf56e48909dea22d2b8722f583:57</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;cookie.data
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;view::900120ab669d9cbf56e48909dea22d2b8722f583<span
                                                            class="phpdebugbar-text-muted"
                                                            >:57</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`extensions`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string">`act`</span> =
                                        <span class="hljs-string"
                                            >'tawk-chat'</span
                                        >
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span> limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 77.299%; width: 12.069%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >420μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:289</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;tawk-chat
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:289</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`extensions`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string">`act`</span> =
                                        <span class="hljs-string"
                                            >'google-analytics'</span
                                        >
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span> limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 89.368%; width: 10.632%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >370μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:283</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;google-analytics
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:283</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="App\Models\Category"
                                >App\Models\Category</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">7</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="App\Models\Frontend"
                                >App\Models\Frontend</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">13</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-mails">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-varlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_token">_token</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="lang">lang</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">en</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_previous">_previous</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "url" =&gt;
                            "http://127.0.0.1:8000/profile-design" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_flash">_flash</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:2 [ "old" =&gt; [] "new" =&gt; [] ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="url">url</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "intended" =&gt;
                            "http://127.0.0.1:8000/email/verify" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="PHPDEBUGBAR_STACK_DATA"
                                >PHPDEBUGBAR_STACK_DATA</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">[]</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="path_info">path_info</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            /profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_code">status_code</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-165462607"
                                data-indent-pad="  "
                            ><span class="sf-dump-num">200</span>
</pre>
                            <script>
                                Sfdump("sf-dump-165462607", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_text">status_text</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">OK</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="format">format</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">html</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="content_type">content_type</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            text/html; charset=UTF-8
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_query">request_query</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-593523815"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-593523815", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_request">request_request</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1301173983"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1301173983", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_headers">request_headers</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1454422463"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:15</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">host</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  </samp>]
  "<span class="sf-dump-key">connection</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-mobile</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-platform</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  </samp>]
  "<span class="sf-dump-key">upgrade-insecure-requests</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str">1</span>"
  </samp>]
  "<span class="sf-dump-key">user-agent</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  </samp>]
  "<span class="sf-dump-key">accept</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-site</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-mode</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-user</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-dest</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  </samp>]
  "<span class="sf-dump-key">accept-encoding</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  </samp>]
  "<span class="sf-dump-key">accept-language</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  </samp>]
  "<span class="sf-dump-key">cookie</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="717 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1454422463", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_server">request_server</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1372503523"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:31</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">DOCUMENT_ROOT</span>" =&gt; "<span class="sf-dump-str" title="25 characters">D:\xampp\htdocs\dureforce</span>"
  "<span class="sf-dump-key">REMOTE_ADDR</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">REMOTE_PORT</span>" =&gt; "<span class="sf-dump-str" title="5 characters">59141</span>"
  "<span class="sf-dump-key">SERVER_SOFTWARE</span>" =&gt; "<span class="sf-dump-str" title="29 characters">PHP 8.0.19 Development Server</span>"
  "<span class="sf-dump-key">SERVER_PROTOCOL</span>" =&gt; "<span class="sf-dump-str" title="8 characters">HTTP/1.1</span>"
  "<span class="sf-dump-key">SERVER_NAME</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">SERVER_PORT</span>" =&gt; "<span class="sf-dump-str" title="4 characters">8000</span>"
  "<span class="sf-dump-key">REQUEST_URI</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">REQUEST_METHOD</span>" =&gt; "<span class="sf-dump-str" title="3 characters">GET</span>"
  "<span class="sf-dump-key">SCRIPT_NAME</span>" =&gt; "<span class="sf-dump-str" title="10 characters">/index.php</span>"
  "<span class="sf-dump-key">SCRIPT_FILENAME</span>" =&gt; "<span class="sf-dump-str" title="35 characters">D:\xampp\htdocs\dureforce\index.php</span>"
  "<span class="sf-dump-key">PATH_INFO</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">PHP_SELF</span>" =&gt; "<span class="sf-dump-str" title="25 characters">/index.php/profile-design</span>"
  "<span class="sf-dump-key">HTTP_HOST</span>" =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  "<span class="sf-dump-key">HTTP_CONNECTION</span>" =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA</span>" =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_MOBILE</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_PLATFORM</span>" =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  "<span class="sf-dump-key">HTTP_UPGRADE_INSECURE_REQUESTS</span>" =&gt; "<span class="sf-dump-str">1</span>"
  "<span class="sf-dump-key">HTTP_USER_AGENT</span>" =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT</span>" =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_SITE</span>" =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_MODE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_USER</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_DEST</span>" =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_ENCODING</span>" =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_LANGUAGE</span>" =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  "<span class="sf-dump-key">HTTP_COOKIE</span>" =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="717 remaining characters"> ▶</a></span></span>"
  "<span class="sf-dump-key">REQUEST_TIME_FLOAT</span>" =&gt; <span class="sf-dump-num">1662661498.8602</span>
  "<span class="sf-dump-key">REQUEST_TIME</span>" =&gt; <span class="sf-dump-num">1662661498</span>
  "<span class="sf-dump-key">HTTPS</span>" =&gt; <span class="sf-dump-const">false</span>
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1372503523", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_cookies">request_cookies</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1043988362"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">XSRF-TOKEN</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">laravel_session</span>" =&gt; "<span class="sf-dump-str" title="40 characters">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V</span>"
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1043988362", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="response_headers"
                                >response_headers</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1039231425"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:5</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">no-cache, private</span>"
  </samp>]
  "<span class="sf-dump-key">date</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="29 characters">Thu, 08 Sep 2022 18:24:59 GMT</span>"
  </samp>]
  "<span class="sf-dump-key">content-type</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="24 characters">text/html; charset=UTF-8</span>"
  </samp>]
  "<span class="sf-dump-key">set-cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="428 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=/; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="268 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="432 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="443 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="283 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="447 remaining characters"> ▶</a></span></span>"
  </samp>]
  "<span class="sf-dump-key">Set-Cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="400 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=/<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="240 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="404 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="415 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=/; httponly<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="255 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="419 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1039231425", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="session_attributes"
                                >session_attributes</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1744438111"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:6</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">_token</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">lang</span>" =&gt; "<span class="sf-dump-str" title="2 characters">en</span>"
  "<span class="sf-dump-key">_previous</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">url</span>" =&gt; "<span class="sf-dump-str" title="36 characters">http://127.0.0.1:8000/profile-design</span>"
  </samp>]
  "<span class="sf-dump-key">_flash</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">old</span>" =&gt; []
    "<span class="sf-dump-key">new</span>" =&gt; []
  </samp>]
  "<span class="sf-dump-key">url</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">intended</span>" =&gt; "<span class="sf-dump-str" title="34 characters">http://127.0.0.1:8000/email/verify</span>"
  </samp>]
  "<span class="sf-dump-key">PHPDEBUGBAR_STACK_DATA</span>" =&gt; []
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1744438111", {"maxDepth":0})
                            </script>
                        </dd>
                    </dl>
                </div>
            </div>
            <a class="phpdebugbar-restore-btn" style=""></a>
        </div>
        <div class="phpdebugbar-openhandler" style="display: none">
            <div class="phpdebugbar-openhandler-header">
                PHP DebugBar | Open<a
                    ><i class="phpdebugbar-fa phpdebugbar-fa-times"></i
                ></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="150">Date</th>
                        <th width="55">Method</th>
                        <th>URL</th>
                        <th width="125">IP</th>
                        <th width="100">Filter data</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="phpdebugbar-openhandler-actions">
                <a>Load more</a><a>Show only current URL</a><a>Show all</a
                ><a>Delete all</a>
                <form>
                    <br /><b>Filter results</b><br />Method:
                    <select name="method">
                        <option></option>
                        <option>GET</option>
                        <option>POST</option>
                        <option>PUT</option>
                        <option>DELETE</option></select
                    ><br />Uri: <input type="text" name="uri" /><br />IP:
                    <input type="text" name="ip" /><br /><button type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div
            class="phpdebugbar-openhandler-overlay"
            style="display: none"
        ></div>
        <div class="phpdebugbar phpdebugbar-minimized phpdebugbar-closed">
            <div class="phpdebugbar-drag-capture"></div>
            <div class="phpdebugbar-resize-handle" style="display: none"></div>
            <div class="phpdebugbar-header" style="display: none">
                <div class="phpdebugbar-header-left">
                    <a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Messages</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i
                        ><span class="phpdebugbar-text">Timeline</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-bug"></i
                        ><span class="phpdebugbar-text">Exceptions</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-leaf"></i
                        ><span class="phpdebugbar-text">Views</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >6</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">Route</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-database"></i
                        ><span class="phpdebugbar-text">Queries</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >8</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cubes"></i
                        ><span class="phpdebugbar-text">Models</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >20</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-inbox"></i
                        ><span class="phpdebugbar-text">Mails</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Gate</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-archive"></i
                        ><span class="phpdebugbar-text">Session</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tags"></i
                        ><span class="phpdebugbar-text">Request</span
                        ><span class="phpdebugbar-badge"></span
                    ></a>
                </div>
                <div class="phpdebugbar-header-right">
                    <a class="phpdebugbar-close-btn"></a
                    ><a class="phpdebugbar-minimize-btn"></a
                    ><a class="phpdebugbar-maximize-btn"></a
                    ><a class="phpdebugbar-open-btn" style=""></a
                    ><select class="phpdebugbar-datasets-switcher">
                        <option value="X01c8dd2eee9700c39b0e1246b21361ad">
                            #1 profile-design (18:24:59)
                        </option></select
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-code"></i
                        ><span class="phpdebugbar-text">8.0.19</span
                        ><span class="phpdebugbar-tooltip"
                            >PHP Version</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-clock-o"></i
                        ><span class="phpdebugbar-text">311ms</span
                        ><span class="phpdebugbar-tooltip"
                            >Request Duration</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i
                        ><span class="phpdebugbar-text">23MB</span
                        ><span class="phpdebugbar-tooltip"
                            >Memory Usage</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">GET profile-design</span
                        ><span class="phpdebugbar-tooltip">Route</span></span
                    >
                </div>
            </div>
            <div class="phpdebugbar-body" style="height: 40px; display: none">
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <ul class="phpdebugbar-widgets-timeline">
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 0%; width: 78.31%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Booting (243ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 79.28%; width: 20.72%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Application (64.35ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <table
                                style="display: table; border: 0; width: 99%"
                                class="phpdebugbar-widgets-params"
                            >
                                <tbody>
                                    <tr>
                                        <td class="phpdebugbar-widgets-name">
                                            1 x Booting (78.31%)
                                        </td>
                                        <td class="phpdebugbar-widgets-value">
                                            <div
                                                class="phpdebugbar-widgets-measure"
                                            >
                                                <span
                                                    class="phpdebugbar-widgets-value"
                                                    style="width: 78.31%"
                                                ></span
                                                ><span
                                                    class="phpdebugbar-widgets-label"
                                                    >243.17ms</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="phpdebugbar-widgets-name">
                                            1 x Application (20.73%)
                                        </td>
                                        <td class="phpdebugbar-widgets-value">
                                            <div
                                                class="phpdebugbar-widgets-measure"
                                            >
                                                <span
                                                    class="phpdebugbar-widgets-value"
                                                    style="width: 20.73%"
                                                ></span
                                                ><span
                                                    class="phpdebugbar-widgets-label"
                                                    >64.35ms</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-exceptions">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-templates">
                        <div class="phpdebugbar-widgets-status">
                            <span>6 templates were rendered</span>
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li class="phpdebugbar-widgets-list-item">
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.project_profile.partials.profile_design
                                    (\resources\views\templates\basic\project_profile\partials\profile_design.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >0</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.layouts.frontend
                                    (\resources\views\templates\basic\layouts\frontend.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.partials.header
                                    (\resources\views\templates\basic\partials\header.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.partials.footer
                                    (\resources\views\templates\basic\partials\footer.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >13</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >partials.plugins
                                    (\resources\views\partials\plugins.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >14</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                13
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>cookie</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                style="cursor: pointer"
                            >
                                <span class="phpdebugbar-widgets-name"
                                    >partials.notify
                                    (\resources\views\partials\notify.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >14</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Params</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                0
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>__env</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>app</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                2
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>paginator</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                3
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>general</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                4
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplate</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                5
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>activeTemplateTrue</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                6
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>language</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                7
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>categorys</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                8
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>ranks</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                9
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>features</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                10
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>fservices</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                11
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>errors</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                12
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>content</code></pre>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                13
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <pre><code>cookie</code></pre>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                        <div class="phpdebugbar-widgets-callgraph"></div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uri">uri</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            GET profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="middleware">middleware</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">web</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uses">uses</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController@__invoke
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="controller">controller</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="namespace">namespace</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            App\Http\Controllers
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="prefix">prefix</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="where">where</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-sqlqueries">
                        <div class="phpdebugbar-widgets-status">
                            <span>8 statements were executed</span
                            ><span
                                title="Accumulated duration"
                                class="phpdebugbar-widgets-duration"
                                >3.48ms</span
                            >
                        </div>
                        <div class="phpdebugbar-widgets-toolbar">
                            <a
                                class="phpdebugbar-widgets-filter"
                                rel="dureforcedb"
                                >dureforcedb</a
                            >
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'breadcrumbs.content'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword">desc</span>
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 0%; width: 17.816%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >620μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:958</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;breadcrumbs.content
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:958</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'footer.content'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword">desc</span>
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 17.816%; width: 14.655%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >510μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:958</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;footer.content
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:958</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'footer.element'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword"
                                            >desc</span
                                        ></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 32.471%; width: 13.218%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >460μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:967</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;footer.element
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:967</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'social_icon.element'</span
                                        >
                                        <span class="hljs-keyword">order</span>
                                        <span class="hljs-keyword">by</span>
                                        <span class="hljs-string">`id`</span>
                                        <span class="hljs-keyword"
                                            >desc</span
                                        ></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 45.69%; width: 10.92%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >380μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:967</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;social_icon.element
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:967</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`categories`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`type_id`</span
                                        >
                                        = <span class="hljs-number">1</span>
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 56.609%; width: 10.345%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >360μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Models\Category.php:30</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;1
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >14.</span
                                                        >&nbsp;\app\Models\Category.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:30</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;view::f4ac9bc1a48b2ad85730bb6a09e25989b17b634f<span
                                                            class="phpdebugbar-text-muted"
                                                            >:47</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`frontends`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string"
                                            >`data_keys`</span
                                        >
                                        =
                                        <span class="hljs-string"
                                            >'cookie.data'</span
                                        >
                                        limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 66.954%; width: 10.345%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >360μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >view::900120ab669d9cbf56e48909dea22d2b8722f583:57</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;cookie.data
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;view::900120ab669d9cbf56e48909dea22d2b8722f583<span
                                                            class="phpdebugbar-text-muted"
                                                            >:57</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >17.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`extensions`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string">`act`</span> =
                                        <span class="hljs-string"
                                            >'tawk-chat'</span
                                        >
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span> limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 77.299%; width: 12.069%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >420μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:289</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;tawk-chat
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:289</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li
                                class="phpdebugbar-widgets-list-item"
                                connection="dureforcedb"
                                style="cursor: pointer"
                            >
                                <code class="phpdebugbar-widgets-sql"
                                    ><span class="hljs-operator"
                                        ><span class="hljs-keyword"
                                            >select</span
                                        >
                                        *
                                        <span class="hljs-keyword">from</span>
                                        <span class="hljs-string"
                                            >`extensions`</span
                                        >
                                        <span class="hljs-keyword">where</span>
                                        <span class="hljs-string">`act`</span> =
                                        <span class="hljs-string"
                                            >'google-analytics'</span
                                        >
                                        <span class="hljs-keyword">and</span>
                                        <span class="hljs-string"
                                            >`status`</span
                                        >
                                        =
                                        <span class="hljs-number">1</span> limit
                                        <span class="hljs-number">1</span></span
                                    ></code
                                >
                                <div class="phpdebugbar-widgets-bg-measure">
                                    <div
                                        class="phpdebugbar-widgets-value"
                                        style="left: 89.368%; width: 10.632%"
                                    ></div>
                                </div>
                                <span
                                    title="Duration"
                                    class="phpdebugbar-widgets-duration"
                                    >370μs</span
                                ><span
                                    title="Prepared statement ID"
                                    class="phpdebugbar-widgets-stmt-id"
                                    >\app\Http\Helpers\helpers.php:283</span
                                ><span
                                    title="Connection"
                                    class="phpdebugbar-widgets-database"
                                    >dureforcedb</span
                                >
                                <table class="phpdebugbar-widgets-params">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Metadata</th>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Bindings
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-thumb-tack phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >0.</span
                                                        >&nbsp;google-analytics
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >1.</span
                                                        >&nbsp;1
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="phpdebugbar-widgets-name"
                                            >
                                                Backtrace
                                                <i
                                                    class="phpdebugbar-fa phpdebugbar-fa-list-ul phpdebugbar-text-muted"
                                                ></i>
                                            </td>
                                            <td
                                                class="phpdebugbar-widgets-value"
                                            >
                                                <ul
                                                    class="phpdebugbar-widgets-table-list"
                                                >
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >15.</span
                                                        >&nbsp;\app\Http\Helpers\helpers.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:283</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >18.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:108</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >19.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:58</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >20.</span
                                                        >&nbsp;\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:61</span
                                                        >
                                                    </li>
                                                    <li
                                                        class="phpdebugbar-widgets-table-list-item"
                                                    >
                                                        <span
                                                            class="phpdebugbar-text-muted"
                                                            >21.</span
                                                        >&nbsp;\vendor\facade\ignition\src\Views\Engines\CompilerEngine.php<span
                                                            class="phpdebugbar-text-muted"
                                                            >:37</span
                                                        >
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="App\Models\Category"
                                >App\Models\Category</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">7</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="App\Models\Frontend"
                                >App\Models\Frontend</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">13</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-mails">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-varlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_token">_token</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="lang">lang</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">en</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_previous">_previous</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "url" =&gt;
                            "http://127.0.0.1:8000/profile-design" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_flash">_flash</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:2 [ "old" =&gt; [] "new" =&gt; [] ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="url">url</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "intended" =&gt;
                            "http://127.0.0.1:8000/email/verify" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="PHPDEBUGBAR_STACK_DATA"
                                >PHPDEBUGBAR_STACK_DATA</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">[]</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="path_info">path_info</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            /profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_code">status_code</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-165462607"
                                data-indent-pad="  "
                            ><span class="sf-dump-num">200</span>
</pre>
                            <script>
                                Sfdump("sf-dump-165462607", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_text">status_text</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">OK</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="format">format</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">html</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="content_type">content_type</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            text/html; charset=UTF-8
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_query">request_query</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-593523815"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-593523815", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_request">request_request</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1301173983"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1301173983", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_headers">request_headers</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1454422463"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:15</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">host</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  </samp>]
  "<span class="sf-dump-key">connection</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-mobile</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-platform</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  </samp>]
  "<span class="sf-dump-key">upgrade-insecure-requests</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str">1</span>"
  </samp>]
  "<span class="sf-dump-key">user-agent</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  </samp>]
  "<span class="sf-dump-key">accept</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-site</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-mode</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-user</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-dest</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  </samp>]
  "<span class="sf-dump-key">accept-encoding</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  </samp>]
  "<span class="sf-dump-key">accept-language</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  </samp>]
  "<span class="sf-dump-key">cookie</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1454422463", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_server">request_server</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1372503523"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:31</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">DOCUMENT_ROOT</span>" =&gt; "<span class="sf-dump-str" title="25 characters">D:\xampp\htdocs\dureforce</span>"
  "<span class="sf-dump-key">REMOTE_ADDR</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">REMOTE_PORT</span>" =&gt; "<span class="sf-dump-str" title="5 characters">59141</span>"
  "<span class="sf-dump-key">SERVER_SOFTWARE</span>" =&gt; "<span class="sf-dump-str" title="29 characters">PHP 8.0.19 Development Server</span>"
  "<span class="sf-dump-key">SERVER_PROTOCOL</span>" =&gt; "<span class="sf-dump-str" title="8 characters">HTTP/1.1</span>"
  "<span class="sf-dump-key">SERVER_NAME</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">SERVER_PORT</span>" =&gt; "<span class="sf-dump-str" title="4 characters">8000</span>"
  "<span class="sf-dump-key">REQUEST_URI</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">REQUEST_METHOD</span>" =&gt; "<span class="sf-dump-str" title="3 characters">GET</span>"
  "<span class="sf-dump-key">SCRIPT_NAME</span>" =&gt; "<span class="sf-dump-str" title="10 characters">/index.php</span>"
  "<span class="sf-dump-key">SCRIPT_FILENAME</span>" =&gt; "<span class="sf-dump-str" title="35 characters">D:\xampp\htdocs\dureforce\index.php</span>"
  "<span class="sf-dump-key">PATH_INFO</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">PHP_SELF</span>" =&gt; "<span class="sf-dump-str" title="25 characters">/index.php/profile-design</span>"
  "<span class="sf-dump-key">HTTP_HOST</span>" =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  "<span class="sf-dump-key">HTTP_CONNECTION</span>" =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA</span>" =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_MOBILE</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_PLATFORM</span>" =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  "<span class="sf-dump-key">HTTP_UPGRADE_INSECURE_REQUESTS</span>" =&gt; "<span class="sf-dump-str">1</span>"
  "<span class="sf-dump-key">HTTP_USER_AGENT</span>" =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT</span>" =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_SITE</span>" =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_MODE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_USER</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_DEST</span>" =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_ENCODING</span>" =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_LANGUAGE</span>" =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  "<span class="sf-dump-key">HTTP_COOKIE</span>" =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9POUhrNUFhaVJ3MXF5dmV3VlpQenFEcm9lb2ovcUVqc1N2MzlnNWFlVlZ0ZWROZlg4bTMrV0xOblh2UjYiLCJtYWMiOiI1ZWU4MmZlYTZiM2EwOTllYjcwZDJlMmU2NGZiMTM2YTVjODQ3Yjc2ODZmNmQyMGJlZTY2NzZkODMwYzIzMzgyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InYrOW1laEdkRWlBbmNwZkVzaUtqRXc9PSIsInZhbHVlIjoiTHlzVzZsSUVPTHBQZkFIMWovV0ppSG1JdzZ1QjJCNHZXWFpkUDcxa0g0Z1lTRVdGRjlJWTNBbWN1NmhlVklEcWtTU2l1am04R29TZ2FnVGRmakZrRUhjd0tVK1UyZEl3VjRvM3RwMGNtVEE1NXFUSElsT3BUUHowaTVsamVlWkkiLCJtYWMiOiIzOGU1NWI5ZWIwODBhYzljZjIyMDFiYmVlOTNjOWM1ZjdlNTNmZGY5YzZmMDZjYjIzZDVjM2NjNjUyY2NmNzVlIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik1QNUVSVkVLQitDWFB2bzlPZS9lYnc9PSIsInZhbHVlIjoiN0FRZ2JaaEhKc1JRcHZhQVRTejNTcHpmNEJMUjFXa0VLSEhsb1dCV1pRMmx4UFkwUjNUM0xzR0RZQ1QyTEs2ajZMZk9PO<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span></span>"
  "<span class="sf-dump-key">REQUEST_TIME_FLOAT</span>" =&gt; <span class="sf-dump-num">1662661498.8602</span>
  "<span class="sf-dump-key">REQUEST_TIME</span>" =&gt; <span class="sf-dump-num">1662661498</span>
  "<span class="sf-dump-key">HTTPS</span>" =&gt; <span class="sf-dump-const">false</span>
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1372503523", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_cookies">request_cookies</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1043988362"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">XSRF-TOKEN</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">laravel_session</span>" =&gt; "<span class="sf-dump-str" title="40 characters">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V</span>"
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1043988362", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="response_headers"
                                >response_headers</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1039231425"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:5</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">no-cache, private</span>"
  </samp>]
  "<span class="sf-dump-key">date</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="29 characters">Thu, 08 Sep 2022 18:24:59 GMT</span>"
  </samp>]
  "<span class="sf-dump-key">content-type</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="24 characters">text/html; charset=UTF-8</span>"
  </samp>]
  "<span class="sf-dump-key">set-cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="428 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=/; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="268 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="443 characters"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="283 remaining characters"> ▶</a></span></span>"
  </samp>]
  "<span class="sf-dump-key">Set-Cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="400 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqUytVMENmK1BQVG1pYmY5b0p1d3BoZElZSDRoL3VzWEFUTWdQVFFHQWsvbEFhYnlrSncyUmZqeFd2Vm4iLCJtYWMiOiIzNzk4Y2MyNGUyZmYxMWI2NTk0MjM3ZGFkYmQzMzgxM2ZjYjIyNWY5M2FkM2IxYjk2MDRhMDZlMTRhZDMzYTIwIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=/<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ikl3NXd0czNvY2FFd2FJZjgxeXJaZWc9PSIsInZhbHVlIjoiN0R4emZkcFk1U083ZFQ1d0FhRTFWek9JR0hWQUV5UGdxVlgwTlFiYWpBcHNCeURHSGxVVTN5bG1NRmh5Ky9XV1ozK2lqU<a class="sf-dump-ref sf-dump-str-toggle" title="240 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="415 characters"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05CN2NkS1Y0MnM3NVFCdUpLaDJpNkJab1JUa29tYUEwajFVL2l4SW1OVkJzMTFEUXhTZjZqT2wxcTJqTEgvT2QiLCJtYWMiOiJhOTY4YjZhMWU2MTcyMTU4NDk0N2I2NzdiNWUwNjFkNGVlMzE3YzhkN2YyNWE4ZDQ0MTZlNGNmZjdlODhmZmJjIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:24:59 GMT; path=/; httponly<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IjF6WFB5VGhZUXFMSjFkOHZsM083c3c9PSIsInZhbHVlIjoiOEp1dXR4RmpyMWFpQVZjeXRPbFNvZ2NKZ1l6S21qdjMzdk9aeTl2bWo4MXpZd1didUlxZXFqZ0tBV0ZhVnRpN05C<a class="sf-dump-ref sf-dump-str-toggle" title="255 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1039231425", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="session_attributes"
                                >session_attributes</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1744438111"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:6</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">_token</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">lang</span>" =&gt; "<span class="sf-dump-str" title="2 characters">en</span>"
  "<span class="sf-dump-key">_previous</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">url</span>" =&gt; "<span class="sf-dump-str" title="36 characters">http://127.0.0.1:8000/profile-design</span>"
  </samp>]
  "<span class="sf-dump-key">_flash</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">old</span>" =&gt; []
    "<span class="sf-dump-key">new</span>" =&gt; []
  </samp>]
  "<span class="sf-dump-key">url</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">intended</span>" =&gt; "<span class="sf-dump-str" title="34 characters">http://127.0.0.1:8000/email/verify</span>"
  </samp>]
  "<span class="sf-dump-key">PHPDEBUGBAR_STACK_DATA</span>" =&gt; []
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1744438111", {"maxDepth":0})
                            </script>
                        </dd>
                    </dl>
                </div>
            </div>
            <a class="phpdebugbar-restore-btn" style=""></a>
        </div>
        <div class="phpdebugbar-openhandler" style="display: none">
            <div class="phpdebugbar-openhandler-header">
                PHP DebugBar | Open<a
                    ><i class="phpdebugbar-fa phpdebugbar-fa-times"></i
                ></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="150">Date</th>
                        <th width="55">Method</th>
                        <th>URL</th>
                        <th width="125">IP</th>
                        <th width="100">Filter data</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="phpdebugbar-openhandler-actions">
                <a>Load more</a><a>Show only current URL</a><a>Show all</a
                ><a>Delete all</a>
                <form>
                    <br /><b>Filter results</b><br />Method:
                    <select name="method">
                        <option></option>
                        <option>GET</option>
                        <option>POST</option>
                        <option>PUT</option>
                        <option>DELETE</option></select
                    ><br />Uri: <input type="text" name="uri" /><br />IP:
                    <input type="text" name="ip" /><br /><button type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div
            class="phpdebugbar-openhandler-overlay"
            style="display: none"
        ></div>

        <script type="text/javascript">
            var phpdebugbar = new PhpDebugBar.DebugBar();
            phpdebugbar.addIndicator("php_version", new PhpDebugBar.DebugBar.Indicator({"icon":"code","tooltip":"PHP Version"}), "right");
            phpdebugbar.addTab("messages", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Messages", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
            phpdebugbar.addIndicator("time", new PhpDebugBar.DebugBar.Indicator({"icon":"clock-o","tooltip":"Request Duration"}), "right");
            phpdebugbar.addTab("timeline", new PhpDebugBar.DebugBar.Tab({"icon":"tasks","title":"Timeline", "widget": new PhpDebugBar.Widgets.TimelineWidget()}));
            phpdebugbar.addIndicator("memory", new PhpDebugBar.DebugBar.Indicator({"icon":"cogs","tooltip":"Memory Usage"}), "right");
            phpdebugbar.addTab("exceptions", new PhpDebugBar.DebugBar.Tab({"icon":"bug","title":"Exceptions", "widget": new PhpDebugBar.Widgets.ExceptionsWidget()}));
            phpdebugbar.addTab("views", new PhpDebugBar.DebugBar.Tab({"icon":"leaf","title":"Views", "widget": new PhpDebugBar.Widgets.TemplatesWidget()}));
            phpdebugbar.addTab("route", new PhpDebugBar.DebugBar.Tab({"icon":"share","title":"Route", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.addIndicator("currentroute", new PhpDebugBar.DebugBar.Indicator({"icon":"share","tooltip":"Route"}), "right");
            phpdebugbar.addTab("queries", new PhpDebugBar.DebugBar.Tab({"icon":"database","title":"Queries", "widget": new PhpDebugBar.Widgets.LaravelSQLQueriesWidget()}));
            phpdebugbar.addTab("models", new PhpDebugBar.DebugBar.Tab({"icon":"cubes","title":"Models", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.addTab("emails", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Mails", "widget": new PhpDebugBar.Widgets.MailsWidget()}));
            phpdebugbar.addTab("gate", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Gate", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
            phpdebugbar.addTab("session", new PhpDebugBar.DebugBar.Tab({"icon":"archive","title":"Session", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
            phpdebugbar.addTab("request", new PhpDebugBar.DebugBar.Tab({"icon":"tags","title":"Request", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.setDataMap({
            "php_version": ["php.version", ],
            "messages": ["messages.messages", []],
            "messages:badge": ["messages.count", null],
            "time": ["time.duration_str", '0ms'],
            "timeline": ["time", {}],
            "memory": ["memory.peak_usage_str", '0B'],
            "exceptions": ["exceptions.exceptions", []],
            "exceptions:badge": ["exceptions.count", null],
            "views": ["views", []],
            "views:badge": ["views.nb_templates", 0],
            "route": ["route", {}],
            "currentroute": ["route.uri", ],
            "queries": ["queries", []],
            "queries:badge": ["queries.nb_statements", 0],
            "models": ["models.data", {}],
            "models:badge": ["models.count", 0],
            "emails": ["swiftmailer_mails.mails", []],
            "emails:badge": ["swiftmailer_mails.count", null],
            "gate": ["gate.messages", []],
            "gate:badge": ["gate.count", null],
            "session": ["session", {}],
            "request": ["request", {}]
            });
            phpdebugbar.restoreState();
            phpdebugbar.ajaxHandler = new PhpDebugBar.AjaxHandler(phpdebugbar, undefined, true);
            phpdebugbar.ajaxHandler.bindToFetch();
            phpdebugbar.ajaxHandler.bindToXHR();
            phpdebugbar.setOpenHandler(new PhpDebugBar.OpenHandler({"url":"http:\/\/127.0.0.1:8000\/_debugbar\/open"}));
            phpdebugbar.addDataSet({"__meta":{"id":"X0665547b779c16771b3c2ffcb5851879","datetime":"2022-09-08 18:33:49","utime":1662662029.288271,"method":"GET","uri":"\/profile-design","ip":"127.0.0.1"},"php":{"version":"8.0.19","interface":"cli-server"},"messages":{"count":0,"messages":[]},"time":{"start":1662662028.957875,"end":1662662029.288288,"duration":0.3304131031036377,"duration_str":"330ms","measures":[{"label":"Booting","start":1662662028.957875,"relative_start":0,"end":1662662029.231388,"relative_end":1662662029.231388,"duration":0.2735130786895752,"duration_str":"274ms","params":[],"collector":null},{"label":"Application","start":1662662029.234823,"relative_start":0.2769479751586914,"end":1662662029.28829,"relative_end":1.9073486328125e-6,"duration":0.0534670352935791,"duration_str":"53.47ms","params":[],"collector":null}]},"memory":{"peak_usage":24513656,"peak_usage_str":"23MB"},"exceptions":{"count":0,"exceptions":[]},"views":{"nb_templates":1,"templates":[{"name":"templates.basic.project_profile.partials.profile_design (\\resources\\views\\templates\\basic\\project_profile\\partials\\profile_design.blade.php)","param_count":0,"params":[],"type":"blade"}]},"route":{"uri":"GET profile-design","middleware":"web","uses":"\\Illuminate\\Routing\\ViewController@__invoke","controller":"\\Illuminate\\Routing\\ViewController","namespace":"App\\Http\\Controllers","prefix":"","where":[]},"queries":{"nb_statements":0,"nb_failed_statements":0,"accumulated_duration":0,"accumulated_duration_str":"0\u03bcs","statements":[]},"models":{"data":[],"count":0},"swiftmailer_mails":{"count":0,"mails":[]},"gate":{"count":0,"messages":[]},"session":{"_token":"spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk","lang":"en","_previous":"array:1 [\n  \"url\" => \"http:\/\/127.0.0.1:8000\/profile-design\"\n]","_flash":"array:2 [\n  \"old\" => []\n  \"new\" => []\n]","url":"array:1 [\n  \"intended\" => \"http:\/\/127.0.0.1:8000\/email\/verify\"\n]","PHPDEBUGBAR_STACK_DATA":"[]"},"request":{"path_info":"\/profile-design","status_code":"<pre class=sf-dump id=sf-dump-1963189970 data-indent-pad=\"  \"><span class=sf-dump-num>200<\/span>\n<\/pre><script>Sfdump(\"sf-dump-1963189970\", {\"maxDepth\":0})<\/script>\n","status_text":"OK","format":"html","content_type":"text\/html; charset=UTF-8","request_query":"<pre class=sf-dump id=sf-dump-1239432477 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-1239432477\", {\"maxDepth\":0})<\/script>\n","request_request":"<pre class=sf-dump id=sf-dump-117595965 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-117595965\", {\"maxDepth\":0})<\/script>\n","request_headers":"<pre class=sf-dump id=sf-dump-1267577820 data-indent-pad=\"  \"><span class=sf-dump-note>array:16<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>host<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"14 characters\">127.0.0.1:8000<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>connection<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"64 characters\">&quot;Google Chrome&quot;;v=&quot;105&quot;, &quot;Not)A;Brand&quot;;v=&quot;8&quot;, &quot;Chromium&quot;;v=&quot;105&quot;<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua-mobile<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"2 characters\">?0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua-platform<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"9 characters\">&quot;Windows&quot;<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>upgrade-insecure-requests<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str>1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>user-agent<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"111 characters\">Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/105.0.0.0 Safari\/537.36<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.9<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>purpose<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">prefetch<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-site<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"4 characters\">none<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-mode<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">navigate<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-user<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"2 characters\">?1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-dest<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">document<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-encoding<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">gzip, deflate, br<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-language<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"26 characters\">en-GB,en-US;q=0.9,en;q=0.8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>cookie<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"713 characters\">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNybHA4Mmp2bFFCQlVsSTU2WUtBaVZCa1FrRmtPUXFXeVpvbWc4K290ZlNJbkpwekcwaUFvSFRyWjZKV2YiLCJtYWMiOiIxMTY2NWU2YjRjNzNhMmE5OWNkNmE5MTYwYzc2M2E0OTBmMDYxM2ZjOGE2NWQwY2ZjMzVmNDE2NTAyYzljOWQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjhyZ3VVNTltMnVUMW5CNXRoeUlSWVE9PSIsInZhbHVlIjoiUzkzMmVkWUpDZGphd0t3NS9DS0ZqaENKZlc3cXJEbVAvZE1IME1ZTkVFQzM5Z0xBdVdCcDdCWi9wL0tBSk9ENDVZWHJCdnpNamoxZFlPejhrL2d6Q2NDanN4NnpkeUxhSGNmcUpULzF0Y3pBRytCNlljVHVNTzNNWEQxMDQzb1AiLCJtYWMiOiI5Mzk1NTVjN2I4ODhkNGQyZTBlYmJiMzJmYjFlN2RiZjMwZmNjODBkMDlkY2YxNWRhNDExNTE0NmQ4MWJhNmY0IiwidGFnIjoiIn0%3D<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1267577820\", {\"maxDepth\":0})<\/script>\n","request_server":"<pre class=sf-dump id=sf-dump-350627349 data-indent-pad=\"  \"><span class=sf-dump-note>array:32<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">D:\\xampp\\htdocs\\dureforce<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_PORT<\/span>\" => \"<span class=sf-dump-str title=\"5 characters\">58121<\/span>\"\n  \"<span class=sf-dump-key>SERVER_SOFTWARE<\/span>\" => \"<span class=sf-dump-str title=\"29 characters\">PHP 8.0.19 Development Server<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PROTOCOL<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">HTTP\/1.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_NAME<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PORT<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">8000<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_URI<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_METHOD<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">GET<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_NAME<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_FILENAME<\/span>\" => \"<span class=sf-dump-str title=\"35 characters\">D:\\xampp\\htdocs\\dureforce\\index.php<\/span>\"\n  \"<span class=sf-dump-key>PATH_INFO<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>PHP_SELF<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">\/index.php\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>HTTP_HOST<\/span>\" => \"<span class=sf-dump-str title=\"14 characters\">127.0.0.1:8000<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CONNECTION<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA<\/span>\" => \"<span class=sf-dump-str title=\"64 characters\">&quot;Google Chrome&quot;;v=&quot;105&quot;, &quot;Not)A;Brand&quot;;v=&quot;8&quot;, &quot;Chromium&quot;;v=&quot;105&quot;<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA_MOBILE<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">?0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA_PLATFORM<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">&quot;Windows&quot;<\/span>\"\n  \"<span class=sf-dump-key>HTTP_UPGRADE_INSECURE_REQUESTS<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_USER_AGENT<\/span>\" => \"<span class=sf-dump-str title=\"111 characters\">Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/105.0.0.0 Safari\/537.36<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT<\/span>\" => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.9<\/span>\"\n  \"<span class=sf-dump-key>HTTP_PURPOSE<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">prefetch<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_SITE<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">none<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_MODE<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">navigate<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_USER<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">?1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_DEST<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">document<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_ENCODING<\/span>\" => \"<span class=sf-dump-str title=\"17 characters\">gzip, deflate, br<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_LANGUAGE<\/span>\" => \"<span class=sf-dump-str title=\"26 characters\">en-GB,en-US;q=0.9,en;q=0.8<\/span>\"\n  \"<span class=sf-dump-key>HTTP_COOKIE<\/span>\" => \"<span class=sf-dump-str title=\"713 characters\">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNybHA4Mmp2bFFCQlVsSTU2WUtBaVZCa1FrRmtPUXFXeVpvbWc4K290ZlNJbkpwekcwaUFvSFRyWjZKV2YiLCJtYWMiOiIxMTY2NWU2YjRjNzNhMmE5OWNkNmE5MTYwYzc2M2E0OTBmMDYxM2ZjOGE2NWQwY2ZjMzVmNDE2NTAyYzljOWQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjhyZ3VVNTltMnVUMW5CNXRoeUlSWVE9PSIsInZhbHVlIjoiUzkzMmVkWUpDZGphd0t3NS9DS0ZqaENKZlc3cXJEbVAvZE1IME1ZTkVFQzM5Z0xBdVdCcDdCWi9wL0tBSk9ENDVZWHJCdnpNamoxZFlPejhrL2d6Q2NDanN4NnpkeUxhSGNmcUpULzF0Y3pBRytCNlljVHVNTzNNWEQxMDQzb1AiLCJtYWMiOiI5Mzk1NTVjN2I4ODhkNGQyZTBlYmJiMzJmYjFlN2RiZjMwZmNjODBkMDlkY2YxNWRhNDExNTE0NmQ4MWJhNmY0IiwidGFnIjoiIn0%3D<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_TIME_FLOAT<\/span>\" => <span class=sf-dump-num>1662662028.9579<\/span>\n  \"<span class=sf-dump-key>REQUEST_TIME<\/span>\" => <span class=sf-dump-num>1662662028<\/span>\n  \"<span class=sf-dump-key>HTTPS<\/span>\" => <span class=sf-dump-const>false<\/span>\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-350627349\", {\"maxDepth\":0})<\/script>\n","request_cookies":"<pre class=sf-dump id=sf-dump-1177071931 data-indent-pad=\"  \"><span class=sf-dump-note>array:2<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>XSRF-TOKEN<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk<\/span>\"\n  \"<span class=sf-dump-key>laravel_session<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1177071931\", {\"maxDepth\":0})<\/script>\n","response_headers":"<pre class=sf-dump id=sf-dump-258302378 data-indent-pad=\"  \"><span class=sf-dump-note>array:5<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">no-cache, private<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>date<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"29 characters\">Thu, 08 Sep 2022 18:33:49 GMT<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>content-type<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"24 characters\">text\/html; charset=UTF-8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>set-cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"428 characters\">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZiaDBqbDdROWpQOCt3MVVJenB0N0pHaWkzVzBnelpxYUdiQ2pQd282aE42QzNBZVJlTnB4OTFQbm9ZVUkiLCJtYWMiOiJhMGRkZWY0OGVmOGY1M2NmNjhhNGU2ZDEyNmIyNDEzYjZiNGFkNjc2MjE2MmRiY2Q2NGE2ZTVhMjg4NjczYjFkIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; Max-Age=7200; path=\/; samesite=lax<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"443 characters\">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lvYlZjT3ZrQnd5VE51VFowSE1kdFhwTGpTeDExOU9IZ3NhWUt1TWNRTXR5QkpHcXFNMnV1aGVuckxtNVhwNXkiLCJtYWMiOiJiYjYyNTEyNGVjMWYwNDIwYjhhMWRiZTlkZWQ4ZjNhMjY5OWYyYWEzMzM4M2VjODE5YTU1OWRhMTI0MWRlYmI3IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; Max-Age=7200; path=\/; httponly; samesite=lax<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>Set-Cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"400 characters\">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZiaDBqbDdROWpQOCt3MVVJenB0N0pHaWkzVzBnelpxYUdiQ2pQd282aE42QzNBZVJlTnB4OTFQbm9ZVUkiLCJtYWMiOiJhMGRkZWY0OGVmOGY1M2NmNjhhNGU2ZDEyNmIyNDEzYjZiNGFkNjc2MjE2MmRiY2Q2NGE2ZTVhMjg4NjczYjFkIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; path=\/<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"415 characters\">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lvYlZjT3ZrQnd5VE51VFowSE1kdFhwTGpTeDExOU9IZ3NhWUt1TWNRTXR5QkpHcXFNMnV1aGVuckxtNVhwNXkiLCJtYWMiOiJiYjYyNTEyNGVjMWYwNDIwYjhhMWRiZTlkZWQ4ZjNhMjY5OWYyYWEzMzM4M2VjODE5YTU1OWRhMTI0MWRlYmI3IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; path=\/; httponly<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-258302378\", {\"maxDepth\":0})<\/script>\n","session_attributes":"<pre class=sf-dump id=sf-dump-1560908570 data-indent-pad=\"  \"><span class=sf-dump-note>array:6<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>_token<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk<\/span>\"\n  \"<span class=sf-dump-key>lang<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">en<\/span>\"\n  \"<span class=sf-dump-key>_previous<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>url<\/span>\" => \"<span class=sf-dump-str title=\"36 characters\">http:\/\/127.0.0.1:8000\/profile-design<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>_flash<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>old<\/span>\" => []\n    \"<span class=sf-dump-key>new<\/span>\" => []\n  <\/samp>]\n  \"<span class=sf-dump-key>url<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>intended<\/span>\" => \"<span class=sf-dump-str title=\"34 characters\">http:\/\/127.0.0.1:8000\/email\/verify<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>PHPDEBUGBAR_STACK_DATA<\/span>\" => []\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1560908570\", {\"maxDepth\":0})<\/script>\n"}}, "X0665547b779c16771b3c2ffcb5851879");
        </script>
        <div class="phpdebugbar phpdebugbar-minimized phpdebugbar-closed">
            <div class="phpdebugbar-drag-capture"></div>
            <div class="phpdebugbar-resize-handle" style="display: none"></div>
            <div class="phpdebugbar-header" style="display: none">
                <div class="phpdebugbar-header-left">
                    <a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Messages</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i
                        ><span class="phpdebugbar-text">Timeline</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-bug"></i
                        ><span class="phpdebugbar-text">Exceptions</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-leaf"></i
                        ><span class="phpdebugbar-text">Views</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >1</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">Route</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-database"></i
                        ><span class="phpdebugbar-text">Queries</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >0</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cubes"></i
                        ><span class="phpdebugbar-text">Models</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >0</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-inbox"></i
                        ><span class="phpdebugbar-text">Mails</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Gate</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-archive"></i
                        ><span class="phpdebugbar-text">Session</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tags"></i
                        ><span class="phpdebugbar-text">Request</span
                        ><span class="phpdebugbar-badge"></span
                    ></a>
                </div>
                <div class="phpdebugbar-header-right">
                    <a class="phpdebugbar-close-btn"></a
                    ><a class="phpdebugbar-minimize-btn"></a
                    ><a class="phpdebugbar-maximize-btn"></a
                    ><a class="phpdebugbar-open-btn" style=""></a
                    ><select class="phpdebugbar-datasets-switcher">
                        <option value="X0665547b779c16771b3c2ffcb5851879">
                            #1 profile-design (18:33:49)
                        </option></select
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-code"></i
                        ><span class="phpdebugbar-text">8.0.19</span
                        ><span class="phpdebugbar-tooltip"
                            >PHP Version</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-clock-o"></i
                        ><span class="phpdebugbar-text">330ms</span
                        ><span class="phpdebugbar-tooltip"
                            >Request Duration</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i
                        ><span class="phpdebugbar-text">23MB</span
                        ><span class="phpdebugbar-tooltip"
                            >Memory Usage</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">GET profile-design</span
                        ><span class="phpdebugbar-tooltip">Route</span></span
                    >
                </div>
            </div>
            <div class="phpdebugbar-body" style="height: 40px; display: none">
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <ul class="phpdebugbar-widgets-timeline">
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 0%; width: 82.78%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Booting (274ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 83.82%; width: 16.18%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Application (53.47ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <table
                                style="display: table; border: 0; width: 99%"
                                class="phpdebugbar-widgets-params"
                            >
                                <tr>
                                    <td class="phpdebugbar-widgets-name">
                                        1 x Booting (82.78%)
                                    </td>
                                    <td class="phpdebugbar-widgets-value">
                                        <div
                                            class="phpdebugbar-widgets-measure"
                                        >
                                            <span
                                                class="phpdebugbar-widgets-value"
                                                style="width: 82.78%"
                                            ></span
                                            ><span
                                                class="phpdebugbar-widgets-label"
                                                >273.51ms</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="phpdebugbar-widgets-name">
                                        1 x Application (16.18%)
                                    </td>
                                    <td class="phpdebugbar-widgets-value">
                                        <div
                                            class="phpdebugbar-widgets-measure"
                                        >
                                            <span
                                                class="phpdebugbar-widgets-value"
                                                style="width: 16.18%"
                                            ></span
                                            ><span
                                                class="phpdebugbar-widgets-label"
                                                >53.47ms</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-exceptions">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-templates">
                        <div class="phpdebugbar-widgets-status">
                            <span>1 templates were rendered</span>
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li class="phpdebugbar-widgets-list-item">
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.project_profile.partials.profile_design
                                    (\resources\views\templates\basic\project_profile\partials\profile_design.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >0</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                            </li>
                        </ul>
                        <div class="phpdebugbar-widgets-callgraph"></div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uri">uri</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            GET profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="middleware">middleware</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">web</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uses">uses</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController@__invoke
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="controller">controller</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="namespace">namespace</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            App\Http\Controllers
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="prefix">prefix</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="where">where</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-sqlqueries">
                        <div class="phpdebugbar-widgets-status">
                            <span>0 statements were executed</span
                            ><span
                                title="Accumulated duration"
                                class="phpdebugbar-widgets-duration"
                                >0μs</span
                            >
                        </div>
                        <div class="phpdebugbar-widgets-toolbar"></div>
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    ></dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-mails">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-varlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_token">_token</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="lang">lang</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">en</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_previous">_previous</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "url" =&gt;
                            "http://127.0.0.1:8000/profile-design" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_flash">_flash</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:2 [ "old" =&gt; [] "new" =&gt; [] ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="url">url</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "intended" =&gt;
                            "http://127.0.0.1:8000/email/verify" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="PHPDEBUGBAR_STACK_DATA"
                                >PHPDEBUGBAR_STACK_DATA</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">[]</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="path_info">path_info</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            /profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_code">status_code</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1963189970"
                                data-indent-pad="  "
                            ><span class="sf-dump-num">200</span>
</pre>
                            <script>
                                Sfdump("sf-dump-1963189970", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_text">status_text</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">OK</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="format">format</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">html</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="content_type">content_type</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            text/html; charset=UTF-8
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_query">request_query</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1239432477"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1239432477", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_request">request_request</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-117595965"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-117595965", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_headers">request_headers</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1267577820"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:16</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">host</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  </samp>]
  "<span class="sf-dump-key">connection</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-mobile</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-platform</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  </samp>]
  "<span class="sf-dump-key">upgrade-insecure-requests</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str">1</span>"
  </samp>]
  "<span class="sf-dump-key">user-agent</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  </samp>]
  "<span class="sf-dump-key">accept</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  </samp>]
  "<span class="sf-dump-key">purpose</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">prefetch</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-site</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-mode</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-user</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-dest</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  </samp>]
  "<span class="sf-dump-key">accept-encoding</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  </samp>]
  "<span class="sf-dump-key">accept-language</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  </samp>]
  "<span class="sf-dump-key">cookie</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNybHA4Mmp2bFFCQlVsSTU2WUtBaVZCa1FrRmtPUXFXeVpvbWc4K290ZlNJbkpwekcwaUFvSFRyWjZKV2YiLCJtYWMiOiIxMTY2NWU2YjRjNzNhMmE5OWNkNmE5MTYwYzc2M2E0OTBmMDYxM2ZjOGE2NWQwY2ZjMzVmNDE2NTAyYzljOWQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjhyZ3VVNTltMnVUMW5CNXRoeUlSWVE9PSIsInZhbHVlIjoiUzkzMmVkWUpDZGphd0t3NS9DS0ZqaENKZlc3cXJEbVAvZE1IME1ZTkVFQzM5Z0xBdVdCcDdCWi9wL0tBSk9ENDVZWHJCdnpNamoxZFlPejhrL2d6Q2NDanN4NnpkeUxhSGNmcUpULzF0Y3pBRytCNlljVHVNTzNNWEQxMDQzb1AiLCJtYWMiOiI5Mzk1NTVjN2I4ODhkNGQyZTBlYmJiMzJmYjFlN2RiZjMwZmNjODBkMDlkY2YxNWRhNDExNTE0NmQ4MWJhNmY0IiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNyb<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNyb<a class="sf-dump-ref sf-dump-str-toggle" title="717 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1267577820", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_server">request_server</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-350627349"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:32</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">DOCUMENT_ROOT</span>" =&gt; "<span class="sf-dump-str" title="25 characters">D:\xampp\htdocs\dureforce</span>"
  "<span class="sf-dump-key">REMOTE_ADDR</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">REMOTE_PORT</span>" =&gt; "<span class="sf-dump-str" title="5 characters">58121</span>"
  "<span class="sf-dump-key">SERVER_SOFTWARE</span>" =&gt; "<span class="sf-dump-str" title="29 characters">PHP 8.0.19 Development Server</span>"
  "<span class="sf-dump-key">SERVER_PROTOCOL</span>" =&gt; "<span class="sf-dump-str" title="8 characters">HTTP/1.1</span>"
  "<span class="sf-dump-key">SERVER_NAME</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">SERVER_PORT</span>" =&gt; "<span class="sf-dump-str" title="4 characters">8000</span>"
  "<span class="sf-dump-key">REQUEST_URI</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">REQUEST_METHOD</span>" =&gt; "<span class="sf-dump-str" title="3 characters">GET</span>"
  "<span class="sf-dump-key">SCRIPT_NAME</span>" =&gt; "<span class="sf-dump-str" title="10 characters">/index.php</span>"
  "<span class="sf-dump-key">SCRIPT_FILENAME</span>" =&gt; "<span class="sf-dump-str" title="35 characters">D:\xampp\htdocs\dureforce\index.php</span>"
  "<span class="sf-dump-key">PATH_INFO</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">PHP_SELF</span>" =&gt; "<span class="sf-dump-str" title="25 characters">/index.php/profile-design</span>"
  "<span class="sf-dump-key">HTTP_HOST</span>" =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  "<span class="sf-dump-key">HTTP_CONNECTION</span>" =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA</span>" =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_MOBILE</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_PLATFORM</span>" =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  "<span class="sf-dump-key">HTTP_UPGRADE_INSECURE_REQUESTS</span>" =&gt; "<span class="sf-dump-str">1</span>"
  "<span class="sf-dump-key">HTTP_USER_AGENT</span>" =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT</span>" =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  "<span class="sf-dump-key">HTTP_PURPOSE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">prefetch</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_SITE</span>" =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_MODE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_USER</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_DEST</span>" =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_ENCODING</span>" =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_LANGUAGE</span>" =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  "<span class="sf-dump-key">HTTP_COOKIE</span>" =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNybHA4Mmp2bFFCQlVsSTU2WUtBaVZCa1FrRmtPUXFXeVpvbWc4K290ZlNJbkpwekcwaUFvSFRyWjZKV2YiLCJtYWMiOiIxMTY2NWU2YjRjNzNhMmE5OWNkNmE5MTYwYzc2M2E0OTBmMDYxM2ZjOGE2NWQwY2ZjMzVmNDE2NTAyYzljOWQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjhyZ3VVNTltMnVUMW5CNXRoeUlSWVE9PSIsInZhbHVlIjoiUzkzMmVkWUpDZGphd0t3NS9DS0ZqaENKZlc3cXJEbVAvZE1IME1ZTkVFQzM5Z0xBdVdCcDdCWi9wL0tBSk9ENDVZWHJCdnpNamoxZFlPejhrL2d6Q2NDanN4NnpkeUxhSGNmcUpULzF0Y3pBRytCNlljVHVNTzNNWEQxMDQzb1AiLCJtYWMiOiI5Mzk1NTVjN2I4ODhkNGQyZTBlYmJiMzJmYjFlN2RiZjMwZmNjODBkMDlkY2YxNWRhNDExNTE0NmQ4MWJhNmY0IiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNyb<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNyb<a class="sf-dump-ref sf-dump-str-toggle" title="717 remaining characters"> ▶</a></span></span>"
  "<span class="sf-dump-key">REQUEST_TIME_FLOAT</span>" =&gt; <span class="sf-dump-num">1662662028.9579</span>
  "<span class="sf-dump-key">REQUEST_TIME</span>" =&gt; <span class="sf-dump-num">1662662028</span>
  "<span class="sf-dump-key">HTTPS</span>" =&gt; <span class="sf-dump-const">false</span>
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-350627349", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_cookies">request_cookies</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1177071931"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">XSRF-TOKEN</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">laravel_session</span>" =&gt; "<span class="sf-dump-str" title="40 characters">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V</span>"
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1177071931", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="response_headers"
                                >response_headers</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-258302378"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:5</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">no-cache, private</span>"
  </samp>]
  "<span class="sf-dump-key">date</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="29 characters">Thu, 08 Sep 2022 18:33:49 GMT</span>"
  </samp>]
  "<span class="sf-dump-key">content-type</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="24 characters">text/html; charset=UTF-8</span>"
  </samp>]
  "<span class="sf-dump-key">set-cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="428 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZiaDBqbDdROWpQOCt3MVVJenB0N0pHaWkzVzBnelpxYUdiQ2pQd282aE42QzNBZVJlTnB4OTFQbm9ZVUkiLCJtYWMiOiJhMGRkZWY0OGVmOGY1M2NmNjhhNGU2ZDEyNmIyNDEzYjZiNGFkNjc2MjE2MmRiY2Q2NGE2ZTVhMjg4NjczYjFkIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; Max-Age=7200; path=/; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZia<a class="sf-dump-ref sf-dump-str-toggle" title="268 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZia<a class="sf-dump-ref sf-dump-str-toggle" title="432 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="443 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lvYlZjT3ZrQnd5VE51VFowSE1kdFhwTGpTeDExOU9IZ3NhWUt1TWNRTXR5QkpHcXFNMnV1aGVuckxtNVhwNXkiLCJtYWMiOiJiYjYyNTEyNGVjMWYwNDIwYjhhMWRiZTlkZWQ4ZjNhMjY5OWYyYWEzMzM4M2VjODE5YTU1OWRhMTI0MWRlYmI3IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lv<a class="sf-dump-ref sf-dump-str-toggle" title="283 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lv<a class="sf-dump-ref sf-dump-str-toggle" title="447 remaining characters"> ▶</a></span></span>"
  </samp>]
  "<span class="sf-dump-key">Set-Cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="400 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZiaDBqbDdROWpQOCt3MVVJenB0N0pHaWkzVzBnelpxYUdiQ2pQd282aE42QzNBZVJlTnB4OTFQbm9ZVUkiLCJtYWMiOiJhMGRkZWY0OGVmOGY1M2NmNjhhNGU2ZDEyNmIyNDEzYjZiNGFkNjc2MjE2MmRiY2Q2NGE2ZTVhMjg4NjczYjFkIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; path=/<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZia<a class="sf-dump-ref sf-dump-str-toggle" title="240 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZia<a class="sf-dump-ref sf-dump-str-toggle" title="404 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse sf-dump-str-collapse" title="415 characters"><span class="sf-dump-str-collapse"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lvYlZjT3ZrQnd5VE51VFowSE1kdFhwTGpTeDExOU9IZ3NhWUt1TWNRTXR5QkpHcXFNMnV1aGVuckxtNVhwNXkiLCJtYWMiOiJiYjYyNTEyNGVjMWYwNDIwYjhhMWRiZTlkZWQ4ZjNhMjY5OWYyYWEzMzM4M2VjODE5YTU1OWRhMTI0MWRlYmI3IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; path=/; httponly<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lv<a class="sf-dump-ref sf-dump-str-toggle" title="255 remaining characters"> ▶</a></span><a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lv<a class="sf-dump-ref sf-dump-str-toggle" title="419 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-258302378", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="session_attributes"
                                >session_attributes</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1560908570"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:6</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▼</span> <span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">_token</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">lang</span>" =&gt; "<span class="sf-dump-str" title="2 characters">en</span>"
  "<span class="sf-dump-key">_previous</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">url</span>" =&gt; "<span class="sf-dump-str" title="36 characters">http://127.0.0.1:8000/profile-design</span>"
  </samp>]
  "<span class="sf-dump-key">_flash</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">old</span>" =&gt; []
    "<span class="sf-dump-key">new</span>" =&gt; []
  </samp>]
  "<span class="sf-dump-key">url</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle sf-dump-toggle" title="[Ctrl+click] Expand all children
[Ctrl+click] Expand all children"><span>▶</span> <span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">intended</span>" =&gt; "<span class="sf-dump-str" title="34 characters">http://127.0.0.1:8000/email/verify</span>"
  </samp>]
  "<span class="sf-dump-key">PHPDEBUGBAR_STACK_DATA</span>" =&gt; []
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1560908570", {"maxDepth":0})
                            </script>
                        </dd>
                    </dl>
                </div>
            </div>
            <a class="phpdebugbar-restore-btn" style=""></a>
        </div>
        <div class="phpdebugbar-openhandler" style="display: none">
            <div class="phpdebugbar-openhandler-header">
                PHP DebugBar | Open<a
                    ><i class="phpdebugbar-fa phpdebugbar-fa-times"></i
                ></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="150">Date</th>
                        <th width="55">Method</th>
                        <th>URL</th>
                        <th width="125">IP</th>
                        <th width="100">Filter data</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="phpdebugbar-openhandler-actions">
                <a>Load more</a><a>Show only current URL</a><a>Show all</a
                ><a>Delete all</a>
                <form>
                    <br /><b>Filter results</b><br />Method:
                    <select name="method">
                        <option></option>
                        <option>GET</option>
                        <option>POST</option>
                        <option>PUT</option>
                        <option>DELETE</option></select
                    ><br />Uri: <input type="text" name="uri" /><br />IP:
                    <input type="text" name="ip" /><br /><button type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div
            class="phpdebugbar-openhandler-overlay"
            style="display: none"
        ></div>
        <div class="phpdebugbar phpdebugbar-minimized phpdebugbar-closed">
            <div class="phpdebugbar-drag-capture"></div>
            <div class="phpdebugbar-resize-handle" style="display: none"></div>
            <div class="phpdebugbar-header" style="display: none">
                <div class="phpdebugbar-header-left">
                    <a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Messages</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i
                        ><span class="phpdebugbar-text">Timeline</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-bug"></i
                        ><span class="phpdebugbar-text">Exceptions</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-leaf"></i
                        ><span class="phpdebugbar-text">Views</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >1</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">Route</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-database"></i
                        ><span class="phpdebugbar-text">Queries</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >0</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cubes"></i
                        ><span class="phpdebugbar-text">Models</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >0</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-inbox"></i
                        ><span class="phpdebugbar-text">Mails</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Gate</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-archive"></i
                        ><span class="phpdebugbar-text">Session</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tags"></i
                        ><span class="phpdebugbar-text">Request</span
                        ><span class="phpdebugbar-badge"></span
                    ></a>
                </div>
                <div class="phpdebugbar-header-right">
                    <a class="phpdebugbar-close-btn"></a
                    ><a class="phpdebugbar-minimize-btn"></a
                    ><a class="phpdebugbar-maximize-btn"></a
                    ><a class="phpdebugbar-open-btn" style=""></a
                    ><select class="phpdebugbar-datasets-switcher">
                        <option value="X0665547b779c16771b3c2ffcb5851879">
                            #1 profile-design (18:33:49)
                        </option></select
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-code"></i
                        ><span class="phpdebugbar-text">8.0.19</span
                        ><span class="phpdebugbar-tooltip"
                            >PHP Version</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-clock-o"></i
                        ><span class="phpdebugbar-text">330ms</span
                        ><span class="phpdebugbar-tooltip"
                            >Request Duration</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i
                        ><span class="phpdebugbar-text">23MB</span
                        ><span class="phpdebugbar-tooltip"
                            >Memory Usage</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">GET profile-design</span
                        ><span class="phpdebugbar-tooltip">Route</span></span
                    >
                </div>
            </div>
            <div class="phpdebugbar-body" style="height: 40px; display: none">
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <ul class="phpdebugbar-widgets-timeline">
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 0%; width: 82.78%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Booting (274ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 83.82%; width: 16.18%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Application (53.47ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <table
                                style="display: table; border: 0; width: 99%"
                                class="phpdebugbar-widgets-params"
                            >
                                <tbody>
                                    <tr>
                                        <td class="phpdebugbar-widgets-name">
                                            1 x Booting (82.78%)
                                        </td>
                                        <td class="phpdebugbar-widgets-value">
                                            <div
                                                class="phpdebugbar-widgets-measure"
                                            >
                                                <span
                                                    class="phpdebugbar-widgets-value"
                                                    style="width: 82.78%"
                                                ></span
                                                ><span
                                                    class="phpdebugbar-widgets-label"
                                                    >273.51ms</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="phpdebugbar-widgets-name">
                                            1 x Application (16.18%)
                                        </td>
                                        <td class="phpdebugbar-widgets-value">
                                            <div
                                                class="phpdebugbar-widgets-measure"
                                            >
                                                <span
                                                    class="phpdebugbar-widgets-value"
                                                    style="width: 16.18%"
                                                ></span
                                                ><span
                                                    class="phpdebugbar-widgets-label"
                                                    >53.47ms</span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-exceptions">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-templates">
                        <div class="phpdebugbar-widgets-status">
                            <span>1 templates were rendered</span>
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li class="phpdebugbar-widgets-list-item">
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.project_profile.partials.profile_design
                                    (\resources\views\templates\basic\project_profile\partials\profile_design.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >0</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                            </li>
                        </ul>
                        <div class="phpdebugbar-widgets-callgraph"></div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uri">uri</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            GET profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="middleware">middleware</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">web</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uses">uses</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController@__invoke
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="controller">controller</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="namespace">namespace</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            App\Http\Controllers
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="prefix">prefix</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="where">where</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-sqlqueries">
                        <div class="phpdebugbar-widgets-status">
                            <span>0 statements were executed</span
                            ><span
                                title="Accumulated duration"
                                class="phpdebugbar-widgets-duration"
                                >0μs</span
                            >
                        </div>
                        <div class="phpdebugbar-widgets-toolbar"></div>
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    ></dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-mails">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-varlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_token">_token</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="lang">lang</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">en</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_previous">_previous</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "url" =&gt;
                            "http://127.0.0.1:8000/profile-design" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_flash">_flash</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:2 [ "old" =&gt; [] "new" =&gt; [] ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="url">url</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "intended" =&gt;
                            "http://127.0.0.1:8000/email/verify" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="PHPDEBUGBAR_STACK_DATA"
                                >PHPDEBUGBAR_STACK_DATA</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">[]</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="path_info">path_info</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            /profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_code">status_code</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1963189970"
                                data-indent-pad="  "
                            ><span class="sf-dump-num">200</span>
</pre>
                            <script>
                                Sfdump("sf-dump-1963189970", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_text">status_text</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">OK</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="format">format</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">html</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="content_type">content_type</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            text/html; charset=UTF-8
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_query">request_query</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1239432477"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1239432477", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_request">request_request</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-117595965"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-117595965", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_headers">request_headers</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1267577820"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:16</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">host</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  </samp>]
  "<span class="sf-dump-key">connection</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-mobile</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-platform</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  </samp>]
  "<span class="sf-dump-key">upgrade-insecure-requests</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str">1</span>"
  </samp>]
  "<span class="sf-dump-key">user-agent</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  </samp>]
  "<span class="sf-dump-key">accept</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  </samp>]
  "<span class="sf-dump-key">purpose</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">prefetch</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-site</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-mode</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-user</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-dest</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  </samp>]
  "<span class="sf-dump-key">accept-encoding</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  </samp>]
  "<span class="sf-dump-key">accept-language</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  </samp>]
  "<span class="sf-dump-key">cookie</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNybHA4Mmp2bFFCQlVsSTU2WUtBaVZCa1FrRmtPUXFXeVpvbWc4K290ZlNJbkpwekcwaUFvSFRyWjZKV2YiLCJtYWMiOiIxMTY2NWU2YjRjNzNhMmE5OWNkNmE5MTYwYzc2M2E0OTBmMDYxM2ZjOGE2NWQwY2ZjMzVmNDE2NTAyYzljOWQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjhyZ3VVNTltMnVUMW5CNXRoeUlSWVE9PSIsInZhbHVlIjoiUzkzMmVkWUpDZGphd0t3NS9DS0ZqaENKZlc3cXJEbVAvZE1IME1ZTkVFQzM5Z0xBdVdCcDdCWi9wL0tBSk9ENDVZWHJCdnpNamoxZFlPejhrL2d6Q2NDanN4NnpkeUxhSGNmcUpULzF0Y3pBRytCNlljVHVNTzNNWEQxMDQzb1AiLCJtYWMiOiI5Mzk1NTVjN2I4ODhkNGQyZTBlYmJiMzJmYjFlN2RiZjMwZmNjODBkMDlkY2YxNWRhNDExNTE0NmQ4MWJhNmY0IiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNyb<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1267577820", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_server">request_server</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-350627349"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:32</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">DOCUMENT_ROOT</span>" =&gt; "<span class="sf-dump-str" title="25 characters">D:\xampp\htdocs\dureforce</span>"
  "<span class="sf-dump-key">REMOTE_ADDR</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">REMOTE_PORT</span>" =&gt; "<span class="sf-dump-str" title="5 characters">58121</span>"
  "<span class="sf-dump-key">SERVER_SOFTWARE</span>" =&gt; "<span class="sf-dump-str" title="29 characters">PHP 8.0.19 Development Server</span>"
  "<span class="sf-dump-key">SERVER_PROTOCOL</span>" =&gt; "<span class="sf-dump-str" title="8 characters">HTTP/1.1</span>"
  "<span class="sf-dump-key">SERVER_NAME</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">SERVER_PORT</span>" =&gt; "<span class="sf-dump-str" title="4 characters">8000</span>"
  "<span class="sf-dump-key">REQUEST_URI</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">REQUEST_METHOD</span>" =&gt; "<span class="sf-dump-str" title="3 characters">GET</span>"
  "<span class="sf-dump-key">SCRIPT_NAME</span>" =&gt; "<span class="sf-dump-str" title="10 characters">/index.php</span>"
  "<span class="sf-dump-key">SCRIPT_FILENAME</span>" =&gt; "<span class="sf-dump-str" title="35 characters">D:\xampp\htdocs\dureforce\index.php</span>"
  "<span class="sf-dump-key">PATH_INFO</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">PHP_SELF</span>" =&gt; "<span class="sf-dump-str" title="25 characters">/index.php/profile-design</span>"
  "<span class="sf-dump-key">HTTP_HOST</span>" =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  "<span class="sf-dump-key">HTTP_CONNECTION</span>" =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA</span>" =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_MOBILE</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_PLATFORM</span>" =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  "<span class="sf-dump-key">HTTP_UPGRADE_INSECURE_REQUESTS</span>" =&gt; "<span class="sf-dump-str">1</span>"
  "<span class="sf-dump-key">HTTP_USER_AGENT</span>" =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT</span>" =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  "<span class="sf-dump-key">HTTP_PURPOSE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">prefetch</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_SITE</span>" =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_MODE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_USER</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_DEST</span>" =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_ENCODING</span>" =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_LANGUAGE</span>" =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  "<span class="sf-dump-key">HTTP_COOKIE</span>" =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNybHA4Mmp2bFFCQlVsSTU2WUtBaVZCa1FrRmtPUXFXeVpvbWc4K290ZlNJbkpwekcwaUFvSFRyWjZKV2YiLCJtYWMiOiIxMTY2NWU2YjRjNzNhMmE5OWNkNmE5MTYwYzc2M2E0OTBmMDYxM2ZjOGE2NWQwY2ZjMzVmNDE2NTAyYzljOWQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjhyZ3VVNTltMnVUMW5CNXRoeUlSWVE9PSIsInZhbHVlIjoiUzkzMmVkWUpDZGphd0t3NS9DS0ZqaENKZlc3cXJEbVAvZE1IME1ZTkVFQzM5Z0xBdVdCcDdCWi9wL0tBSk9ENDVZWHJCdnpNamoxZFlPejhrL2d6Q2NDanN4NnpkeUxhSGNmcUpULzF0Y3pBRytCNlljVHVNTzNNWEQxMDQzb1AiLCJtYWMiOiI5Mzk1NTVjN2I4ODhkNGQyZTBlYmJiMzJmYjFlN2RiZjMwZmNjODBkMDlkY2YxNWRhNDExNTE0NmQ4MWJhNmY0IiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IjBZY2k3VVBmbXlCZlc5eHVmNlBtelE9PSIsInZhbHVlIjoiMXhCSFBwZ0ZRQmtFMVp1cUVGV2d3MFlESDh3cTdzOEltS21aT2RuMlZ6WnhIN2ZTRGZIRUxBSllpZWFaSVdSVkxTNHNyb<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span></span>"
  "<span class="sf-dump-key">REQUEST_TIME_FLOAT</span>" =&gt; <span class="sf-dump-num">1662662028.9579</span>
  "<span class="sf-dump-key">REQUEST_TIME</span>" =&gt; <span class="sf-dump-num">1662662028</span>
  "<span class="sf-dump-key">HTTPS</span>" =&gt; <span class="sf-dump-const">false</span>
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-350627349", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_cookies">request_cookies</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1177071931"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">XSRF-TOKEN</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">laravel_session</span>" =&gt; "<span class="sf-dump-str" title="40 characters">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V</span>"
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1177071931", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="response_headers"
                                >response_headers</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-258302378"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:5</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">no-cache, private</span>"
  </samp>]
  "<span class="sf-dump-key">date</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="29 characters">Thu, 08 Sep 2022 18:33:49 GMT</span>"
  </samp>]
  "<span class="sf-dump-key">content-type</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="24 characters">text/html; charset=UTF-8</span>"
  </samp>]
  "<span class="sf-dump-key">set-cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="428 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZiaDBqbDdROWpQOCt3MVVJenB0N0pHaWkzVzBnelpxYUdiQ2pQd282aE42QzNBZVJlTnB4OTFQbm9ZVUkiLCJtYWMiOiJhMGRkZWY0OGVmOGY1M2NmNjhhNGU2ZDEyNmIyNDEzYjZiNGFkNjc2MjE2MmRiY2Q2NGE2ZTVhMjg4NjczYjFkIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; Max-Age=7200; path=/; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZia<a class="sf-dump-ref sf-dump-str-toggle" title="268 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="443 characters"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lvYlZjT3ZrQnd5VE51VFowSE1kdFhwTGpTeDExOU9IZ3NhWUt1TWNRTXR5QkpHcXFNMnV1aGVuckxtNVhwNXkiLCJtYWMiOiJiYjYyNTEyNGVjMWYwNDIwYjhhMWRiZTlkZWQ4ZjNhMjY5OWYyYWEzMzM4M2VjODE5YTU1OWRhMTI0MWRlYmI3IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; Max-Age=7200; path=/; httponly; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lv<a class="sf-dump-ref sf-dump-str-toggle" title="283 remaining characters"> ▶</a></span></span>"
  </samp>]
  "<span class="sf-dump-key">Set-Cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="400 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZiaDBqbDdROWpQOCt3MVVJenB0N0pHaWkzVzBnelpxYUdiQ2pQd282aE42QzNBZVJlTnB4OTFQbm9ZVUkiLCJtYWMiOiJhMGRkZWY0OGVmOGY1M2NmNjhhNGU2ZDEyNmIyNDEzYjZiNGFkNjc2MjE2MmRiY2Q2NGE2ZTVhMjg4NjczYjFkIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; path=/<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6IlpvRnB2YUdPdzBlMU0yR0hTamVhd3c9PSIsInZhbHVlIjoieGdjWGpzeHQ4cFNvODBHV0I2U0s3NTYrUVNydDZQVnV4Z08xZm9icG94TzhhOTR2RUh6OHRvWS9YS2hTaDQ5TWd4QlZia<a class="sf-dump-ref sf-dump-str-toggle" title="240 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="415 characters"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lvYlZjT3ZrQnd5VE51VFowSE1kdFhwTGpTeDExOU9IZ3NhWUt1TWNRTXR5QkpHcXFNMnV1aGVuckxtNVhwNXkiLCJtYWMiOiJiYjYyNTEyNGVjMWYwNDIwYjhhMWRiZTlkZWQ4ZjNhMjY5OWYyYWEzMzM4M2VjODE5YTU1OWRhMTI0MWRlYmI3IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:33:49 GMT; path=/; httponly<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkRFMnRUV2haR0RRc0dJanlIbk1tWUE9PSIsInZhbHVlIjoiWDlUYjhRbXFDelZLNUlDSHVieU83MWl5SnJpcVQrVFc2M2RHSit1ampXTjlGamEvREdPdG15ODNxd1pNRzArU3lv<a class="sf-dump-ref sf-dump-str-toggle" title="255 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-258302378", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="session_attributes"
                                >session_attributes</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1560908570"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:6</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">_token</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">lang</span>" =&gt; "<span class="sf-dump-str" title="2 characters">en</span>"
  "<span class="sf-dump-key">_previous</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">url</span>" =&gt; "<span class="sf-dump-str" title="36 characters">http://127.0.0.1:8000/profile-design</span>"
  </samp>]
  "<span class="sf-dump-key">_flash</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">old</span>" =&gt; []
    "<span class="sf-dump-key">new</span>" =&gt; []
  </samp>]
  "<span class="sf-dump-key">url</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">intended</span>" =&gt; "<span class="sf-dump-str" title="34 characters">http://127.0.0.1:8000/email/verify</span>"
  </samp>]
  "<span class="sf-dump-key">PHPDEBUGBAR_STACK_DATA</span>" =&gt; []
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1560908570", {"maxDepth":0})
                            </script>
                        </dd>
                    </dl>
                </div>
            </div>
            <a class="phpdebugbar-restore-btn" style=""></a>
        </div>
        <div class="phpdebugbar-openhandler" style="display: none">
            <div class="phpdebugbar-openhandler-header">
                PHP DebugBar | Open<a
                    ><i class="phpdebugbar-fa phpdebugbar-fa-times"></i
                ></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="150">Date</th>
                        <th width="55">Method</th>
                        <th>URL</th>
                        <th width="125">IP</th>
                        <th width="100">Filter data</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="phpdebugbar-openhandler-actions">
                <a>Load more</a><a>Show only current URL</a><a>Show all</a
                ><a>Delete all</a>
                <form>
                    <br /><b>Filter results</b><br />Method:
                    <select name="method">
                        <option></option>
                        <option>GET</option>
                        <option>POST</option>
                        <option>PUT</option>
                        <option>DELETE</option></select
                    ><br />Uri: <input type="text" name="uri" /><br />IP:
                    <input type="text" name="ip" /><br /><button type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div
            class="phpdebugbar-openhandler-overlay"
            style="display: none"
        ></div>
        <script type="text/javascript">
            var phpdebugbar = new PhpDebugBar.DebugBar();
            phpdebugbar.addIndicator("php_version", new PhpDebugBar.DebugBar.Indicator({"icon":"code","tooltip":"PHP Version"}), "right");
            phpdebugbar.addTab("messages", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Messages", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
            phpdebugbar.addIndicator("time", new PhpDebugBar.DebugBar.Indicator({"icon":"clock-o","tooltip":"Request Duration"}), "right");
            phpdebugbar.addTab("timeline", new PhpDebugBar.DebugBar.Tab({"icon":"tasks","title":"Timeline", "widget": new PhpDebugBar.Widgets.TimelineWidget()}));
            phpdebugbar.addIndicator("memory", new PhpDebugBar.DebugBar.Indicator({"icon":"cogs","tooltip":"Memory Usage"}), "right");
            phpdebugbar.addTab("exceptions", new PhpDebugBar.DebugBar.Tab({"icon":"bug","title":"Exceptions", "widget": new PhpDebugBar.Widgets.ExceptionsWidget()}));
            phpdebugbar.addTab("views", new PhpDebugBar.DebugBar.Tab({"icon":"leaf","title":"Views", "widget": new PhpDebugBar.Widgets.TemplatesWidget()}));
            phpdebugbar.addTab("route", new PhpDebugBar.DebugBar.Tab({"icon":"share","title":"Route", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.addIndicator("currentroute", new PhpDebugBar.DebugBar.Indicator({"icon":"share","tooltip":"Route"}), "right");
            phpdebugbar.addTab("queries", new PhpDebugBar.DebugBar.Tab({"icon":"database","title":"Queries", "widget": new PhpDebugBar.Widgets.LaravelSQLQueriesWidget()}));
            phpdebugbar.addTab("models", new PhpDebugBar.DebugBar.Tab({"icon":"cubes","title":"Models", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.addTab("emails", new PhpDebugBar.DebugBar.Tab({"icon":"inbox","title":"Mails", "widget": new PhpDebugBar.Widgets.MailsWidget()}));
            phpdebugbar.addTab("gate", new PhpDebugBar.DebugBar.Tab({"icon":"list-alt","title":"Gate", "widget": new PhpDebugBar.Widgets.MessagesWidget()}));
            phpdebugbar.addTab("session", new PhpDebugBar.DebugBar.Tab({"icon":"archive","title":"Session", "widget": new PhpDebugBar.Widgets.VariableListWidget()}));
            phpdebugbar.addTab("request", new PhpDebugBar.DebugBar.Tab({"icon":"tags","title":"Request", "widget": new PhpDebugBar.Widgets.HtmlVariableListWidget()}));
            phpdebugbar.setDataMap({
            "php_version": ["php.version", ],
            "messages": ["messages.messages", []],
            "messages:badge": ["messages.count", null],
            "time": ["time.duration_str", '0ms'],
            "timeline": ["time", {}],
            "memory": ["memory.peak_usage_str", '0B'],
            "exceptions": ["exceptions.exceptions", []],
            "exceptions:badge": ["exceptions.count", null],
            "views": ["views", []],
            "views:badge": ["views.nb_templates", 0],
            "route": ["route", {}],
            "currentroute": ["route.uri", ],
            "queries": ["queries", []],
            "queries:badge": ["queries.nb_statements", 0],
            "models": ["models.data", {}],
            "models:badge": ["models.count", 0],
            "emails": ["swiftmailer_mails.mails", []],
            "emails:badge": ["swiftmailer_mails.count", null],
            "gate": ["gate.messages", []],
            "gate:badge": ["gate.count", null],
            "session": ["session", {}],
            "request": ["request", {}]
            });
            phpdebugbar.restoreState();
            phpdebugbar.ajaxHandler = new PhpDebugBar.AjaxHandler(phpdebugbar, undefined, true);
            phpdebugbar.ajaxHandler.bindToFetch();
            phpdebugbar.ajaxHandler.bindToXHR();
            phpdebugbar.setOpenHandler(new PhpDebugBar.OpenHandler({"url":"http:\/\/127.0.0.1:8000\/_debugbar\/open"}));
            phpdebugbar.addDataSet({"__meta":{"id":"Xa98de19ea2f64b605f3e101fec1dcd3f","datetime":"2022-09-08 18:49:07","utime":1662662947.027035,"method":"GET","uri":"\/profile-design","ip":"127.0.0.1"},"php":{"version":"8.0.19","interface":"cli-server"},"messages":{"count":0,"messages":[]},"time":{"start":1662662946.690707,"end":1662662947.027054,"duration":0.3363471031188965,"duration_str":"336ms","measures":[{"label":"Booting","start":1662662946.690707,"relative_start":0,"end":1662662946.965695,"relative_end":1662662946.965695,"duration":0.27498793601989746,"duration_str":"275ms","params":[],"collector":null},{"label":"Application","start":1662662946.969215,"relative_start":0.27850794792175293,"end":1662662947.027056,"relative_end":1.9073486328125e-6,"duration":0.05784106254577637,"duration_str":"57.84ms","params":[],"collector":null}]},"memory":{"peak_usage":24833600,"peak_usage_str":"24MB"},"exceptions":{"count":0,"exceptions":[]},"views":{"nb_templates":1,"templates":[{"name":"templates.basic.project_profile.partials.profile_design (\\resources\\views\\templates\\basic\\project_profile\\partials\\profile_design.blade.php)","param_count":0,"params":[],"type":"blade"}]},"route":{"uri":"GET profile-design","middleware":"web","uses":"\\Illuminate\\Routing\\ViewController@__invoke","controller":"\\Illuminate\\Routing\\ViewController","namespace":"App\\Http\\Controllers","prefix":"","where":[]},"queries":{"nb_statements":0,"nb_failed_statements":0,"accumulated_duration":0,"accumulated_duration_str":"0\u03bcs","statements":[]},"models":{"data":[],"count":0},"swiftmailer_mails":{"count":0,"mails":[]},"gate":{"count":0,"messages":[]},"session":{"_token":"spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk","lang":"en","_previous":"array:1 [\n  \"url\" => \"http:\/\/127.0.0.1:8000\/profile-design\"\n]","_flash":"array:2 [\n  \"old\" => []\n  \"new\" => []\n]","url":"array:1 [\n  \"intended\" => \"http:\/\/127.0.0.1:8000\/email\/verify\"\n]","PHPDEBUGBAR_STACK_DATA":"[]"},"request":{"path_info":"\/profile-design","status_code":"<pre class=sf-dump id=sf-dump-766943459 data-indent-pad=\"  \"><span class=sf-dump-num>200<\/span>\n<\/pre><script>Sfdump(\"sf-dump-766943459\", {\"maxDepth\":0})<\/script>\n","status_text":"OK","format":"html","content_type":"text\/html; charset=UTF-8","request_query":"<pre class=sf-dump id=sf-dump-1134035579 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-1134035579\", {\"maxDepth\":0})<\/script>\n","request_request":"<pre class=sf-dump id=sf-dump-1863696390 data-indent-pad=\"  \">[]\n<\/pre><script>Sfdump(\"sf-dump-1863696390\", {\"maxDepth\":0})<\/script>\n","request_headers":"<pre class=sf-dump id=sf-dump-1491470782 data-indent-pad=\"  \"><span class=sf-dump-note>array:16<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>host<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"14 characters\">127.0.0.1:8000<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>connection<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"9 characters\">max-age=0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"64 characters\">&quot;Google Chrome&quot;;v=&quot;105&quot;, &quot;Not)A;Brand&quot;;v=&quot;8&quot;, &quot;Chromium&quot;;v=&quot;105&quot;<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua-mobile<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"2 characters\">?0<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-ch-ua-platform<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"9 characters\">&quot;Windows&quot;<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>upgrade-insecure-requests<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str>1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>user-agent<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"111 characters\">Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/105.0.0.0 Safari\/537.36<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.9<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-site<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"4 characters\">none<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-mode<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">navigate<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-user<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"2 characters\">?1<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>sec-fetch-dest<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"8 characters\">document<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-encoding<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">gzip, deflate, br<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>accept-language<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"26 characters\">en-GB,en-US;q=0.9,en;q=0.8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>cookie<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"713 characters\">XSRF-TOKEN=eyJpdiI6Ik54Zjlic01MWlRkWEMyZXhSNnl4L0E9PSIsInZhbHVlIjoiYzhhKzhGUitVZEtqMyttUXlaazMvZFFOREhIZXNMV0xaditoNk1BZHZDczdNeEhTSVZRTjJraFBXdm9DSk51WVJ1djYwQ3FKcXBBTHRwaEgxQTdERnVZYkVQenQzWFVXTGN2UlNlOTBLS1QvL0pTMGxmaVRtcEhnS2ZGaFJnUmsiLCJtYWMiOiIwMjk5Nzk3NmI1MTU5ZmZiYjM0ZWNiYmQ1MDAzZjgxZGYxZGYwZDkwYzY3YzQ4NGI5YTJkMjE0Y2EzNGMyNjk4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImkrOFZFUUZFZVJESTRtSk5BRGUydWc9PSIsInZhbHVlIjoiTDYvSDJsdGRyL3FHalJKbDE1cGFSUCtCWVpwZFNsdE44K1YwaFg5YVVFY1JTRUFJajk5azd4bFNKVzZRbU5TaXBWRnl0V2U5Q254ZUdDa1VLUGpjTlJ4NGk4THY0azlHeUIrUU0relEvYUZKK3VZaXp3RTJZZ2UwY1ZQSUUxQmgiLCJtYWMiOiI1YzRmOGQ4OWUwYjE5Y2RhOWE2YWYxNzQ3ODc3NzZlNDJmYTg0ZDAzNWYwOGZiY2Q3YzY0YTA4Y2E2MDE1ZDViIiwidGFnIjoiIn0%3D<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1491470782\", {\"maxDepth\":0})<\/script>\n","request_server":"<pre class=sf-dump id=sf-dump-1845332484 data-indent-pad=\"  \"><span class=sf-dump-note>array:32<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>DOCUMENT_ROOT<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">D:\\xampp\\htdocs\\dureforce<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_ADDR<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>REMOTE_PORT<\/span>\" => \"<span class=sf-dump-str title=\"5 characters\">53272<\/span>\"\n  \"<span class=sf-dump-key>SERVER_SOFTWARE<\/span>\" => \"<span class=sf-dump-str title=\"29 characters\">PHP 8.0.19 Development Server<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PROTOCOL<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">HTTP\/1.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_NAME<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">127.0.0.1<\/span>\"\n  \"<span class=sf-dump-key>SERVER_PORT<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">8000<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_URI<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_METHOD<\/span>\" => \"<span class=sf-dump-str title=\"3 characters\">GET<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_NAME<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">\/index.php<\/span>\"\n  \"<span class=sf-dump-key>SCRIPT_FILENAME<\/span>\" => \"<span class=sf-dump-str title=\"35 characters\">D:\\xampp\\htdocs\\dureforce\\index.php<\/span>\"\n  \"<span class=sf-dump-key>PATH_INFO<\/span>\" => \"<span class=sf-dump-str title=\"15 characters\">\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>PHP_SELF<\/span>\" => \"<span class=sf-dump-str title=\"25 characters\">\/index.php\/profile-design<\/span>\"\n  \"<span class=sf-dump-key>HTTP_HOST<\/span>\" => \"<span class=sf-dump-str title=\"14 characters\">127.0.0.1:8000<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CONNECTION<\/span>\" => \"<span class=sf-dump-str title=\"10 characters\">keep-alive<\/span>\"\n  \"<span class=sf-dump-key>HTTP_CACHE_CONTROL<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">max-age=0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA<\/span>\" => \"<span class=sf-dump-str title=\"64 characters\">&quot;Google Chrome&quot;;v=&quot;105&quot;, &quot;Not)A;Brand&quot;;v=&quot;8&quot;, &quot;Chromium&quot;;v=&quot;105&quot;<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA_MOBILE<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">?0<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_CH_UA_PLATFORM<\/span>\" => \"<span class=sf-dump-str title=\"9 characters\">&quot;Windows&quot;<\/span>\"\n  \"<span class=sf-dump-key>HTTP_UPGRADE_INSECURE_REQUESTS<\/span>\" => \"<span class=sf-dump-str>1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_USER_AGENT<\/span>\" => \"<span class=sf-dump-str title=\"111 characters\">Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/105.0.0.0 Safari\/537.36<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT<\/span>\" => \"<span class=sf-dump-str title=\"135 characters\">text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/avif,image\/webp,image\/apng,*\/*;q=0.8,application\/signed-exchange;v=b3;q=0.9<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_SITE<\/span>\" => \"<span class=sf-dump-str title=\"4 characters\">none<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_MODE<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">navigate<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_USER<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">?1<\/span>\"\n  \"<span class=sf-dump-key>HTTP_SEC_FETCH_DEST<\/span>\" => \"<span class=sf-dump-str title=\"8 characters\">document<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_ENCODING<\/span>\" => \"<span class=sf-dump-str title=\"17 characters\">gzip, deflate, br<\/span>\"\n  \"<span class=sf-dump-key>HTTP_ACCEPT_LANGUAGE<\/span>\" => \"<span class=sf-dump-str title=\"26 characters\">en-GB,en-US;q=0.9,en;q=0.8<\/span>\"\n  \"<span class=sf-dump-key>HTTP_COOKIE<\/span>\" => \"<span class=sf-dump-str title=\"713 characters\">XSRF-TOKEN=eyJpdiI6Ik54Zjlic01MWlRkWEMyZXhSNnl4L0E9PSIsInZhbHVlIjoiYzhhKzhGUitVZEtqMyttUXlaazMvZFFOREhIZXNMV0xaditoNk1BZHZDczdNeEhTSVZRTjJraFBXdm9DSk51WVJ1djYwQ3FKcXBBTHRwaEgxQTdERnVZYkVQenQzWFVXTGN2UlNlOTBLS1QvL0pTMGxmaVRtcEhnS2ZGaFJnUmsiLCJtYWMiOiIwMjk5Nzk3NmI1MTU5ZmZiYjM0ZWNiYmQ1MDAzZjgxZGYxZGYwZDkwYzY3YzQ4NGI5YTJkMjE0Y2EzNGMyNjk4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImkrOFZFUUZFZVJESTRtSk5BRGUydWc9PSIsInZhbHVlIjoiTDYvSDJsdGRyL3FHalJKbDE1cGFSUCtCWVpwZFNsdE44K1YwaFg5YVVFY1JTRUFJajk5azd4bFNKVzZRbU5TaXBWRnl0V2U5Q254ZUdDa1VLUGpjTlJ4NGk4THY0azlHeUIrUU0relEvYUZKK3VZaXp3RTJZZ2UwY1ZQSUUxQmgiLCJtYWMiOiI1YzRmOGQ4OWUwYjE5Y2RhOWE2YWYxNzQ3ODc3NzZlNDJmYTg0ZDAzNWYwOGZiY2Q3YzY0YTA4Y2E2MDE1ZDViIiwidGFnIjoiIn0%3D<\/span>\"\n  \"<span class=sf-dump-key>REQUEST_TIME_FLOAT<\/span>\" => <span class=sf-dump-num>1662662946.6907<\/span>\n  \"<span class=sf-dump-key>REQUEST_TIME<\/span>\" => <span class=sf-dump-num>1662662946<\/span>\n  \"<span class=sf-dump-key>HTTPS<\/span>\" => <span class=sf-dump-const>false<\/span>\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1845332484\", {\"maxDepth\":0})<\/script>\n","request_cookies":"<pre class=sf-dump id=sf-dump-1339587498 data-indent-pad=\"  \"><span class=sf-dump-note>array:2<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>XSRF-TOKEN<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk<\/span>\"\n  \"<span class=sf-dump-key>laravel_session<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V<\/span>\"\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1339587498\", {\"maxDepth\":0})<\/script>\n","response_headers":"<pre class=sf-dump id=sf-dump-1877550905 data-indent-pad=\"  \"><span class=sf-dump-note>array:5<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>cache-control<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"17 characters\">no-cache, private<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>date<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"29 characters\">Thu, 08 Sep 2022 18:49:07 GMT<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>content-type<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"24 characters\">text\/html; charset=UTF-8<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>set-cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"428 characters\">XSRF-TOKEN=eyJpdiI6InBUV1FzMkZiYXhwRDNqalpDa1R3Q3c9PSIsInZhbHVlIjoiTWpQWmovNm5oVkxLc2ZYNjFaNitCWDllSzFwMnRHOVVnd1JmVW1BZGxNNWJiMUx4RHdPa0JNTUx2MnBCdFJDcUJ6QzFtK1d2OUpVNzJDREttRUMyTFRocUcyNCszcWpLRzBPUGNQM0xWTHRBd0UzaTVIellyRkIxNzFVQlRSWEgiLCJtYWMiOiI0YTI2MDk5MGFlNDBhMzRkOWNlNjQ4MWM5M2NkMWRhMmVlMjFmMmI5ZmE2NjY0Nzg3NzFjZjhlNTY4ZjRiZTg0IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; Max-Age=7200; path=\/; samesite=lax<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"443 characters\">laravel_session=eyJpdiI6IkNoeEYyWWxlRmkxRmJtdU51dUFranc9PSIsInZhbHVlIjoibEJaY05NMnlidzh0dTFFMHc4Q2tXSkdXeGFMQ1VIVHdNU3QwbTd5emEzWWJFeHRmaUVwZXNlL294cnAwdzl5R3lMREUrdlBPeGhrYTNaTGNCdjQrT0xqYy8vWU8zN0JOTTh2aG0zRUZsM2VUVVVhY3VkWkxINEZjZTdQUEZsRGYiLCJtYWMiOiI2ZTE1YWQwYTExN2Q3Y2NmY2NmMzU0YjZlNjMyZTJiMzY4YmY4MWU1ZjEyY2NjNjBjNTczYTQ4NjMyMWQwMjUxIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; Max-Age=7200; path=\/; httponly; samesite=lax<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>Set-Cookie<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    <span class=sf-dump-index>0<\/span> => \"<span class=sf-dump-str title=\"400 characters\">XSRF-TOKEN=eyJpdiI6InBUV1FzMkZiYXhwRDNqalpDa1R3Q3c9PSIsInZhbHVlIjoiTWpQWmovNm5oVkxLc2ZYNjFaNitCWDllSzFwMnRHOVVnd1JmVW1BZGxNNWJiMUx4RHdPa0JNTUx2MnBCdFJDcUJ6QzFtK1d2OUpVNzJDREttRUMyTFRocUcyNCszcWpLRzBPUGNQM0xWTHRBd0UzaTVIellyRkIxNzFVQlRSWEgiLCJtYWMiOiI0YTI2MDk5MGFlNDBhMzRkOWNlNjQ4MWM5M2NkMWRhMmVlMjFmMmI5ZmE2NjY0Nzg3NzFjZjhlNTY4ZjRiZTg0IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; path=\/<\/span>\"\n    <span class=sf-dump-index>1<\/span> => \"<span class=sf-dump-str title=\"415 characters\">laravel_session=eyJpdiI6IkNoeEYyWWxlRmkxRmJtdU51dUFranc9PSIsInZhbHVlIjoibEJaY05NMnlidzh0dTFFMHc4Q2tXSkdXeGFMQ1VIVHdNU3QwbTd5emEzWWJFeHRmaUVwZXNlL294cnAwdzl5R3lMREUrdlBPeGhrYTNaTGNCdjQrT0xqYy8vWU8zN0JOTTh2aG0zRUZsM2VUVVVhY3VkWkxINEZjZTdQUEZsRGYiLCJtYWMiOiI2ZTE1YWQwYTExN2Q3Y2NmY2NmMzU0YjZlNjMyZTJiMzY4YmY4MWU1ZjEyY2NjNjBjNTczYTQ4NjMyMWQwMjUxIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; path=\/; httponly<\/span>\"\n  <\/samp>]\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1877550905\", {\"maxDepth\":0})<\/script>\n","session_attributes":"<pre class=sf-dump id=sf-dump-1062255218 data-indent-pad=\"  \"><span class=sf-dump-note>array:6<\/span> [<samp data-depth=1 class=sf-dump-expanded>\n  \"<span class=sf-dump-key>_token<\/span>\" => \"<span class=sf-dump-str title=\"40 characters\">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk<\/span>\"\n  \"<span class=sf-dump-key>lang<\/span>\" => \"<span class=sf-dump-str title=\"2 characters\">en<\/span>\"\n  \"<span class=sf-dump-key>_previous<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>url<\/span>\" => \"<span class=sf-dump-str title=\"36 characters\">http:\/\/127.0.0.1:8000\/profile-design<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>_flash<\/span>\" => <span class=sf-dump-note>array:2<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>old<\/span>\" => []\n    \"<span class=sf-dump-key>new<\/span>\" => []\n  <\/samp>]\n  \"<span class=sf-dump-key>url<\/span>\" => <span class=sf-dump-note>array:1<\/span> [<samp data-depth=2 class=sf-dump-compact>\n    \"<span class=sf-dump-key>intended<\/span>\" => \"<span class=sf-dump-str title=\"34 characters\">http:\/\/127.0.0.1:8000\/email\/verify<\/span>\"\n  <\/samp>]\n  \"<span class=sf-dump-key>PHPDEBUGBAR_STACK_DATA<\/span>\" => []\n<\/samp>]\n<\/pre><script>Sfdump(\"sf-dump-1062255218\", {\"maxDepth\":0})<\/script>\n"}}, "Xa98de19ea2f64b605f3e101fec1dcd3f");
        </script>
        <div class="phpdebugbar phpdebugbar-minimized phpdebugbar-closed">
            <div class="phpdebugbar-drag-capture"></div>
            <div class="phpdebugbar-resize-handle" style="display: none"></div>
            <div class="phpdebugbar-header" style="display: none">
                <div class="phpdebugbar-header-left">
                    <a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Messages</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tasks"></i
                        ><span class="phpdebugbar-text">Timeline</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-bug"></i
                        ><span class="phpdebugbar-text">Exceptions</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-leaf"></i
                        ><span class="phpdebugbar-text">Views</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >1</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">Route</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-database"></i
                        ><span class="phpdebugbar-text">Queries</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >0</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cubes"></i
                        ><span class="phpdebugbar-text">Models</span
                        ><span class="phpdebugbar-badge phpdebugbar-visible"
                            >0</span
                        ></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-inbox"></i
                        ><span class="phpdebugbar-text">Mails</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-list-alt"></i
                        ><span class="phpdebugbar-text">Gate</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-archive"></i
                        ><span class="phpdebugbar-text">Session</span
                        ><span class="phpdebugbar-badge"></span></a
                    ><a class="phpdebugbar-tab"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-tags"></i
                        ><span class="phpdebugbar-text">Request</span
                        ><span class="phpdebugbar-badge"></span
                    ></a>
                </div>
                <div class="phpdebugbar-header-right">
                    <a class="phpdebugbar-close-btn"></a
                    ><a class="phpdebugbar-minimize-btn"></a
                    ><a class="phpdebugbar-maximize-btn"></a
                    ><a class="phpdebugbar-open-btn" style=""></a
                    ><select class="phpdebugbar-datasets-switcher">
                        <option value="Xa98de19ea2f64b605f3e101fec1dcd3f">
                            #1 profile-design (18:49:07)
                        </option></select
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-code"></i
                        ><span class="phpdebugbar-text">8.0.19</span
                        ><span class="phpdebugbar-tooltip"
                            >PHP Version</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-clock-o"></i
                        ><span class="phpdebugbar-text">336ms</span
                        ><span class="phpdebugbar-tooltip"
                            >Request Duration</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-cogs"></i
                        ><span class="phpdebugbar-text">24MB</span
                        ><span class="phpdebugbar-tooltip"
                            >Memory Usage</span
                        ></span
                    ><span class="phpdebugbar-indicator"
                        ><i class="phpdebugbar-fa phpdebugbar-fa-share"></i
                        ><span class="phpdebugbar-text">GET profile-design</span
                        ><span class="phpdebugbar-tooltip">Route</span></span
                    >
                </div>
            </div>
            <div class="phpdebugbar-body" style="height: 40px; display: none">
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <ul class="phpdebugbar-widgets-timeline">
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 0%; width: 81.76%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Booting (275ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <div class="phpdebugbar-widgets-measure">
                                <span
                                    class="phpdebugbar-widgets-value"
                                    style="left: 82.8%; width: 17.2%"
                                ></span
                                ><span class="phpdebugbar-widgets-label"
                                    >Application (57.84ms)</span
                                >
                            </div>
                        </li>
                        <li>
                            <table
                                style="display: table; border: 0; width: 99%"
                                class="phpdebugbar-widgets-params"
                            >
                                <tr>
                                    <td class="phpdebugbar-widgets-name">
                                        1 x Booting (81.76%)
                                    </td>
                                    <td class="phpdebugbar-widgets-value">
                                        <div
                                            class="phpdebugbar-widgets-measure"
                                        >
                                            <span
                                                class="phpdebugbar-widgets-value"
                                                style="width: 81.76%"
                                            ></span
                                            ><span
                                                class="phpdebugbar-widgets-label"
                                                >274.99ms</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="phpdebugbar-widgets-name">
                                        1 x Application (17.2%)
                                    </td>
                                    <td class="phpdebugbar-widgets-value">
                                        <div
                                            class="phpdebugbar-widgets-measure"
                                        >
                                            <span
                                                class="phpdebugbar-widgets-value"
                                                style="width: 17.2%"
                                            ></span
                                            ><span
                                                class="phpdebugbar-widgets-label"
                                                >57.84ms</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-exceptions">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-templates">
                        <div class="phpdebugbar-widgets-status">
                            <span>1 templates were rendered</span>
                        </div>
                        <ul class="phpdebugbar-widgets-list">
                            <li class="phpdebugbar-widgets-list-item">
                                <span class="phpdebugbar-widgets-name"
                                    >templates.basic.project_profile.partials.profile_design
                                    (\resources\views\templates\basic\project_profile\partials\profile_design.blade.php)</span
                                ><span
                                    title="Parameter count"
                                    class="phpdebugbar-widgets-param-count"
                                    >0</span
                                ><span
                                    title="Type"
                                    class="phpdebugbar-widgets-type"
                                    >blade</span
                                >
                            </li>
                        </ul>
                        <div class="phpdebugbar-widgets-callgraph"></div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uri">uri</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            GET profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="middleware">middleware</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">web</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="uses">uses</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController@__invoke
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="controller">controller</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            \Illuminate\Routing\ViewController
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="namespace">namespace</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            App\Http\Controllers
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="prefix">prefix</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="where">where</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value"></dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-sqlqueries">
                        <div class="phpdebugbar-widgets-status">
                            <span>0 statements were executed</span
                            ><span
                                title="Accumulated duration"
                                class="phpdebugbar-widgets-duration"
                                >0μs</span
                            >
                        </div>
                        <div class="phpdebugbar-widgets-toolbar"></div>
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    ></dl>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-mails">
                        <ul class="phpdebugbar-widgets-list"></ul>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <div class="phpdebugbar-widgets-messages">
                        <ul class="phpdebugbar-widgets-list"></ul>
                        <div class="phpdebugbar-widgets-toolbar">
                            <i class="phpdebugbar-fa phpdebugbar-fa-search"></i
                            ><input type="text" />
                        </div>
                    </div>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-varlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_token">_token</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="lang">lang</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">en</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_previous">_previous</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "url" =&gt;
                            "http://127.0.0.1:8000/profile-design" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="_flash">_flash</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:2 [ "old" =&gt; [] "new" =&gt; [] ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="url">url</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            array:1 [ "intended" =&gt;
                            "http://127.0.0.1:8000/email/verify" ]
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="PHPDEBUGBAR_STACK_DATA"
                                >PHPDEBUGBAR_STACK_DATA</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">[]</dd>
                    </dl>
                </div>
                <div class="phpdebugbar-panel">
                    <dl
                        class="phpdebugbar-widgets-kvlist phpdebugbar-widgets-htmlvarlist"
                    >
                        <dt class="phpdebugbar-widgets-key">
                            <span title="path_info">path_info</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            /profile-design
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_code">status_code</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-766943459"
                                data-indent-pad="  "
                            ><span class="sf-dump-num">200</span>
</pre>
                            <script>
                                Sfdump("sf-dump-766943459", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="status_text">status_text</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">OK</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="format">format</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">html</dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="content_type">content_type</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            text/html; charset=UTF-8
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_query">request_query</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1134035579"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1134035579", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_request">request_request</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1863696390"
                                data-indent-pad="  "
                            >
[]
</pre
                            >
                            <script>
                                Sfdump("sf-dump-1863696390", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_headers">request_headers</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1491470782"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:16</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">host</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  </samp>]
  "<span class="sf-dump-key">connection</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  </samp>]
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">max-age=0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-mobile</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  </samp>]
  "<span class="sf-dump-key">sec-ch-ua-platform</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  </samp>]
  "<span class="sf-dump-key">upgrade-insecure-requests</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str">1</span>"
  </samp>]
  "<span class="sf-dump-key">user-agent</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  </samp>]
  "<span class="sf-dump-key">accept</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-site</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-mode</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-user</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  </samp>]
  "<span class="sf-dump-key">sec-fetch-dest</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  </samp>]
  "<span class="sf-dump-key">accept-encoding</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  </samp>]
  "<span class="sf-dump-key">accept-language</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  </samp>]
  "<span class="sf-dump-key">cookie</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik54Zjlic01MWlRkWEMyZXhSNnl4L0E9PSIsInZhbHVlIjoiYzhhKzhGUitVZEtqMyttUXlaazMvZFFOREhIZXNMV0xaditoNk1BZHZDczdNeEhTSVZRTjJraFBXdm9DSk51WVJ1djYwQ3FKcXBBTHRwaEgxQTdERnVZYkVQenQzWFVXTGN2UlNlOTBLS1QvL0pTMGxmaVRtcEhnS2ZGaFJnUmsiLCJtYWMiOiIwMjk5Nzk3NmI1MTU5ZmZiYjM0ZWNiYmQ1MDAzZjgxZGYxZGYwZDkwYzY3YzQ4NGI5YTJkMjE0Y2EzNGMyNjk4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImkrOFZFUUZFZVJESTRtSk5BRGUydWc9PSIsInZhbHVlIjoiTDYvSDJsdGRyL3FHalJKbDE1cGFSUCtCWVpwZFNsdE44K1YwaFg5YVVFY1JTRUFJajk5azd4bFNKVzZRbU5TaXBWRnl0V2U5Q254ZUdDa1VLUGpjTlJ4NGk4THY0azlHeUIrUU0relEvYUZKK3VZaXp3RTJZZ2UwY1ZQSUUxQmgiLCJtYWMiOiI1YzRmOGQ4OWUwYjE5Y2RhOWE2YWYxNzQ3ODc3NzZlNDJmYTg0ZDAzNWYwOGZiY2Q3YzY0YTA4Y2E2MDE1ZDViIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik54Zjlic01MWlRkWEMyZXhSNnl4L0E9PSIsInZhbHVlIjoiYzhhKzhGUitVZEtqMyttUXlaazMvZFFOREhIZXNMV0xaditoNk1BZHZDczdNeEhTSVZRTjJraFBXdm9DSk51WVJ1djYwQ<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1491470782", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_server">request_server</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1845332484"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:32</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">DOCUMENT_ROOT</span>" =&gt; "<span class="sf-dump-str" title="25 characters">D:\xampp\htdocs\dureforce</span>"
  "<span class="sf-dump-key">REMOTE_ADDR</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">REMOTE_PORT</span>" =&gt; "<span class="sf-dump-str" title="5 characters">53272</span>"
  "<span class="sf-dump-key">SERVER_SOFTWARE</span>" =&gt; "<span class="sf-dump-str" title="29 characters">PHP 8.0.19 Development Server</span>"
  "<span class="sf-dump-key">SERVER_PROTOCOL</span>" =&gt; "<span class="sf-dump-str" title="8 characters">HTTP/1.1</span>"
  "<span class="sf-dump-key">SERVER_NAME</span>" =&gt; "<span class="sf-dump-str" title="9 characters">127.0.0.1</span>"
  "<span class="sf-dump-key">SERVER_PORT</span>" =&gt; "<span class="sf-dump-str" title="4 characters">8000</span>"
  "<span class="sf-dump-key">REQUEST_URI</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">REQUEST_METHOD</span>" =&gt; "<span class="sf-dump-str" title="3 characters">GET</span>"
  "<span class="sf-dump-key">SCRIPT_NAME</span>" =&gt; "<span class="sf-dump-str" title="10 characters">/index.php</span>"
  "<span class="sf-dump-key">SCRIPT_FILENAME</span>" =&gt; "<span class="sf-dump-str" title="35 characters">D:\xampp\htdocs\dureforce\index.php</span>"
  "<span class="sf-dump-key">PATH_INFO</span>" =&gt; "<span class="sf-dump-str" title="15 characters">/profile-design</span>"
  "<span class="sf-dump-key">PHP_SELF</span>" =&gt; "<span class="sf-dump-str" title="25 characters">/index.php/profile-design</span>"
  "<span class="sf-dump-key">HTTP_HOST</span>" =&gt; "<span class="sf-dump-str" title="14 characters">127.0.0.1:8000</span>"
  "<span class="sf-dump-key">HTTP_CONNECTION</span>" =&gt; "<span class="sf-dump-str" title="10 characters">keep-alive</span>"
  "<span class="sf-dump-key">HTTP_CACHE_CONTROL</span>" =&gt; "<span class="sf-dump-str" title="9 characters">max-age=0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA</span>" =&gt; "<span class="sf-dump-str" title="64 characters">"Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_MOBILE</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?0</span>"
  "<span class="sf-dump-key">HTTP_SEC_CH_UA_PLATFORM</span>" =&gt; "<span class="sf-dump-str" title="9 characters">"Windows"</span>"
  "<span class="sf-dump-key">HTTP_UPGRADE_INSECURE_REQUESTS</span>" =&gt; "<span class="sf-dump-str">1</span>"
  "<span class="sf-dump-key">HTTP_USER_AGENT</span>" =&gt; "<span class="sf-dump-str" title="111 characters">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT</span>" =&gt; "<span class="sf-dump-str" title="135 characters">text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_SITE</span>" =&gt; "<span class="sf-dump-str" title="4 characters">none</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_MODE</span>" =&gt; "<span class="sf-dump-str" title="8 characters">navigate</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_USER</span>" =&gt; "<span class="sf-dump-str" title="2 characters">?1</span>"
  "<span class="sf-dump-key">HTTP_SEC_FETCH_DEST</span>" =&gt; "<span class="sf-dump-str" title="8 characters">document</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_ENCODING</span>" =&gt; "<span class="sf-dump-str" title="17 characters">gzip, deflate, br</span>"
  "<span class="sf-dump-key">HTTP_ACCEPT_LANGUAGE</span>" =&gt; "<span class="sf-dump-str" title="26 characters">en-GB,en-US;q=0.9,en;q=0.8</span>"
  "<span class="sf-dump-key">HTTP_COOKIE</span>" =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="713 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6Ik54Zjlic01MWlRkWEMyZXhSNnl4L0E9PSIsInZhbHVlIjoiYzhhKzhGUitVZEtqMyttUXlaazMvZFFOREhIZXNMV0xaditoNk1BZHZDczdNeEhTSVZRTjJraFBXdm9DSk51WVJ1djYwQ3FKcXBBTHRwaEgxQTdERnVZYkVQenQzWFVXTGN2UlNlOTBLS1QvL0pTMGxmaVRtcEhnS2ZGaFJnUmsiLCJtYWMiOiIwMjk5Nzk3NmI1MTU5ZmZiYjM0ZWNiYmQ1MDAzZjgxZGYxZGYwZDkwYzY3YzQ4NGI5YTJkMjE0Y2EzNGMyNjk4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImkrOFZFUUZFZVJESTRtSk5BRGUydWc9PSIsInZhbHVlIjoiTDYvSDJsdGRyL3FHalJKbDE1cGFSUCtCWVpwZFNsdE44K1YwaFg5YVVFY1JTRUFJajk5azd4bFNKVzZRbU5TaXBWRnl0V2U5Q254ZUdDa1VLUGpjTlJ4NGk4THY0azlHeUIrUU0relEvYUZKK3VZaXp3RTJZZ2UwY1ZQSUUxQmgiLCJtYWMiOiI1YzRmOGQ4OWUwYjE5Y2RhOWE2YWYxNzQ3ODc3NzZlNDJmYTg0ZDAzNWYwOGZiY2Q3YzY0YTA4Y2E2MDE1ZDViIiwidGFnIjoiIn0%3D<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6Ik54Zjlic01MWlRkWEMyZXhSNnl4L0E9PSIsInZhbHVlIjoiYzhhKzhGUitVZEtqMyttUXlaazMvZFFOREhIZXNMV0xaditoNk1BZHZDczdNeEhTSVZRTjJraFBXdm9DSk51WVJ1djYwQ<a class="sf-dump-ref sf-dump-str-toggle" title="553 remaining characters"> ▶</a></span></span>"
  "<span class="sf-dump-key">REQUEST_TIME_FLOAT</span>" =&gt; <span class="sf-dump-num">1662662946.6907</span>
  "<span class="sf-dump-key">REQUEST_TIME</span>" =&gt; <span class="sf-dump-num">1662662946</span>
  "<span class="sf-dump-key">HTTPS</span>" =&gt; <span class="sf-dump-const">false</span>
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1845332484", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="request_cookies">request_cookies</span>
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1339587498"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">XSRF-TOKEN</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">laravel_session</span>" =&gt; "<span class="sf-dump-str" title="40 characters">u6aSsZ4KBHVjwHrBeXZQNssGoEMkHh7hrOWxZf7V</span>"
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1339587498", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="response_headers"
                                >response_headers</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1877550905"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:5</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">cache-control</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="17 characters">no-cache, private</span>"
  </samp>]
  "<span class="sf-dump-key">date</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="29 characters">Thu, 08 Sep 2022 18:49:07 GMT</span>"
  </samp>]
  "<span class="sf-dump-key">content-type</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str" title="24 characters">text/html; charset=UTF-8</span>"
  </samp>]
  "<span class="sf-dump-key">set-cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="428 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6InBUV1FzMkZiYXhwRDNqalpDa1R3Q3c9PSIsInZhbHVlIjoiTWpQWmovNm5oVkxLc2ZYNjFaNitCWDllSzFwMnRHOVVnd1JmVW1BZGxNNWJiMUx4RHdPa0JNTUx2MnBCdFJDcUJ6QzFtK1d2OUpVNzJDREttRUMyTFRocUcyNCszcWpLRzBPUGNQM0xWTHRBd0UzaTVIellyRkIxNzFVQlRSWEgiLCJtYWMiOiI0YTI2MDk5MGFlNDBhMzRkOWNlNjQ4MWM5M2NkMWRhMmVlMjFmMmI5ZmE2NjY0Nzg3NzFjZjhlNTY4ZjRiZTg0IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; Max-Age=7200; path=/; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6InBUV1FzMkZiYXhwRDNqalpDa1R3Q3c9PSIsInZhbHVlIjoiTWpQWmovNm5oVkxLc2ZYNjFaNitCWDllSzFwMnRHOVVnd1JmVW1BZGxNNWJiMUx4RHdPa0JNTUx2MnBCdFJDcUJ6QzFtK<a class="sf-dump-ref sf-dump-str-toggle" title="268 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="443 characters"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IkNoeEYyWWxlRmkxRmJtdU51dUFranc9PSIsInZhbHVlIjoibEJaY05NMnlidzh0dTFFMHc4Q2tXSkdXeGFMQ1VIVHdNU3QwbTd5emEzWWJFeHRmaUVwZXNlL294cnAwdzl5R3lMREUrdlBPeGhrYTNaTGNCdjQrT0xqYy8vWU8zN0JOTTh2aG0zRUZsM2VUVVVhY3VkWkxINEZjZTdQUEZsRGYiLCJtYWMiOiI2ZTE1YWQwYTExN2Q3Y2NmY2NmMzU0YjZlNjMyZTJiMzY4YmY4MWU1ZjEyY2NjNjBjNTczYTQ4NjMyMWQwMjUxIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; Max-Age=7200; path=/; httponly; samesite=lax<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkNoeEYyWWxlRmkxRmJtdU51dUFranc9PSIsInZhbHVlIjoibEJaY05NMnlidzh0dTFFMHc4Q2tXSkdXeGFMQ1VIVHdNU3QwbTd5emEzWWJFeHRmaUVwZXNlL294cnAwdzl5R3lM<a class="sf-dump-ref sf-dump-str-toggle" title="283 remaining characters"> ▶</a></span></span>"
  </samp>]
  "<span class="sf-dump-key">Set-Cookie</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    <span class="sf-dump-index">0</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="400 characters"><span class="sf-dump-str-collapse">XSRF-TOKEN=eyJpdiI6InBUV1FzMkZiYXhwRDNqalpDa1R3Q3c9PSIsInZhbHVlIjoiTWpQWmovNm5oVkxLc2ZYNjFaNitCWDllSzFwMnRHOVVnd1JmVW1BZGxNNWJiMUx4RHdPa0JNTUx2MnBCdFJDcUJ6QzFtK1d2OUpVNzJDREttRUMyTFRocUcyNCszcWpLRzBPUGNQM0xWTHRBd0UzaTVIellyRkIxNzFVQlRSWEgiLCJtYWMiOiI0YTI2MDk5MGFlNDBhMzRkOWNlNjQ4MWM5M2NkMWRhMmVlMjFmMmI5ZmE2NjY0Nzg3NzFjZjhlNTY4ZjRiZTg0IiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; path=/<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">XSRF-TOKEN=eyJpdiI6InBUV1FzMkZiYXhwRDNqalpDa1R3Q3c9PSIsInZhbHVlIjoiTWpQWmovNm5oVkxLc2ZYNjFaNitCWDllSzFwMnRHOVVnd1JmVW1BZGxNNWJiMUx4RHdPa0JNTUx2MnBCdFJDcUJ6QzFtK<a class="sf-dump-ref sf-dump-str-toggle" title="240 remaining characters"> ▶</a></span></span>"
    <span class="sf-dump-index">1</span> =&gt; "<span class="sf-dump-str sf-dump-str-collapse" title="415 characters"><span class="sf-dump-str-collapse">laravel_session=eyJpdiI6IkNoeEYyWWxlRmkxRmJtdU51dUFranc9PSIsInZhbHVlIjoibEJaY05NMnlidzh0dTFFMHc4Q2tXSkdXeGFMQ1VIVHdNU3QwbTd5emEzWWJFeHRmaUVwZXNlL294cnAwdzl5R3lMREUrdlBPeGhrYTNaTGNCdjQrT0xqYy8vWU8zN0JOTTh2aG0zRUZsM2VUVVVhY3VkWkxINEZjZTdQUEZsRGYiLCJtYWMiOiI2ZTE1YWQwYTExN2Q3Y2NmY2NmMzU0YjZlNjMyZTJiMzY4YmY4MWU1ZjEyY2NjNjBjNTczYTQ4NjMyMWQwMjUxIiwidGFnIjoiIn0%3D; expires=Thu, 08-Sep-2022 20:49:07 GMT; path=/; httponly<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> ◀</a></span><span class="sf-dump-str-expand">laravel_session=eyJpdiI6IkNoeEYyWWxlRmkxRmJtdU51dUFranc9PSIsInZhbHVlIjoibEJaY05NMnlidzh0dTFFMHc4Q2tXSkdXeGFMQ1VIVHdNU3QwbTd5emEzWWJFeHRmaUVwZXNlL294cnAwdzl5R3lM<a class="sf-dump-ref sf-dump-str-toggle" title="255 remaining characters"> ▶</a></span></span>"
  </samp>]
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1877550905", {"maxDepth":0})
                            </script>
                        </dd>
                        <dt class="phpdebugbar-widgets-key">
                            <span title="session_attributes"
                                >session_attributes</span
                            >
                        </dt>
                        <dd class="phpdebugbar-widgets-value">
                            <pre
                                class="sf-dump"
                                id="sf-dump-1062255218"
                                data-indent-pad="  "
                                tabindex="0"
                            ><div class="sf-dump-search-wrapper sf-dump-search-hidden"> <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0</span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path></svg> </button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"></path></svg> </button> </div><span class="sf-dump-note">array:6</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▼</span></a><samp data-depth="1" class="sf-dump-expanded">
  "<span class="sf-dump-key">_token</span>" =&gt; "<span class="sf-dump-str" title="40 characters">spU5efcgKrPUlohcDS2ROPbIeP0OxgrDbr1742uk</span>"
  "<span class="sf-dump-key">lang</span>" =&gt; "<span class="sf-dump-str" title="2 characters">en</span>"
  "<span class="sf-dump-key">_previous</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">url</span>" =&gt; "<span class="sf-dump-str" title="36 characters">http://127.0.0.1:8000/profile-design</span>"
  </samp>]
  "<span class="sf-dump-key">_flash</span>" =&gt; <span class="sf-dump-note">array:2</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">old</span>" =&gt; []
    "<span class="sf-dump-key">new</span>" =&gt; []
  </samp>]
  "<span class="sf-dump-key">url</span>" =&gt; <span class="sf-dump-note">array:1</span> [<a class="sf-dump-ref sf-dump-toggle" title="[Ctrl+click] Expand all children"><span>▶</span></a><samp data-depth="2" class="sf-dump-compact">
    "<span class="sf-dump-key">intended</span>" =&gt; "<span class="sf-dump-str" title="34 characters">http://127.0.0.1:8000/email/verify</span>"
  </samp>]
  "<span class="sf-dump-key">PHPDEBUGBAR_STACK_DATA</span>" =&gt; []
</samp>]
</pre>
                            <script>
                                Sfdump("sf-dump-1062255218", {"maxDepth":0})
                            </script>
                        </dd>
                    </dl>
                </div>
            </div>
            <a class="phpdebugbar-restore-btn" style=""></a>
        </div>
        <div class="phpdebugbar-openhandler" style="display: none">
            <div class="phpdebugbar-openhandler-header">
                PHP DebugBar | Open<a
                    ><i class="phpdebugbar-fa phpdebugbar-fa-times"></i
                ></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="150">Date</th>
                        <th width="55">Method</th>
                        <th>URL</th>
                        <th width="125">IP</th>
                        <th width="100">Filter data</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="phpdebugbar-openhandler-actions">
                <a>Load more</a><a>Show only current URL</a><a>Show all</a
                ><a>Delete all</a>
                <form>
                    <br /><b>Filter results</b><br />Method:
                    <select name="method">
                        <option></option>
                        <option>GET</option>
                        <option>POST</option>
                        <option>PUT</option>
                        <option>DELETE</option></select
                    ><br />Uri: <input type="text" name="uri" /><br />IP:
                    <input type="text" name="ip" /><br /><button type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div
            class="phpdebugbar-openhandler-overlay"
            style="display: none"
        ></div>
    </body>
</html>
