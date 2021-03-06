CKEditor 4 Changelog
====================

## CKEditor 4.3.2

* [#11331](https://dev.ckeditor.com/ticket/11331): A menu button will have a changed label when selected instead of using the `aria-pressed` attribute.
* [#11177](https://dev.ckeditor.com/ticket/11177): Widget drag handler improvements:
  * [#11176](https://dev.ckeditor.com/ticket/11176): Fixed: Initial position is not updated when the widget data object is empty.
  * [#11001](https://dev.ckeditor.com/ticket/11001): Fixed: Multiple synchronous layout recalculations are caused by initial drag handler positioning causing performance issues.
  * [#11161](https://dev.ckeditor.com/ticket/11161): Fixed: Drag handler is not repositioned in various situations.
  * [#11281](https://dev.ckeditor.com/ticket/11281): Fixed: Drag handler and mask are duplicated after widget reinitialization.
* [#11207](https://dev.ckeditor.com/ticket/11207): [Firefox] Fixed: Misplaced [Enhanced Image](https://ckeditor.com/addon/image2) resizer in the inline editor.
* [#11102](https://dev.ckeditor.com/ticket/11102): `CKEDITOR.template` improvements:
  * [#11102](https://dev.ckeditor.com/ticket/11102): Added newline character support.
  * [#11216](https://dev.ckeditor.com/ticket/11216): Added "\\'" substring support.
* [#11121](https://dev.ckeditor.com/ticket/11121): [Firefox] Fixed: High Contrast mode is enabled when the editor is loaded in a hidden iframe.
* [#11350](https://dev.ckeditor.com/ticket/11350): The default value of [`config.contentsCss`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-contentsCss) is affected by [`CKEDITOR.getUrl`](https://docs.ckeditor.com/#!/api/CKEDITOR-method-getUrl).
* [#11097](https://dev.ckeditor.com/ticket/11097): Improved the [Autogrow](https://ckeditor.com/addon/autogrow) plugin performance when dealing with very big tables.
* [#11290](https://dev.ckeditor.com/ticket/11290): Removed redundant code in the [Source Dialog](https://ckeditor.com/addon/sourcedialog) plugin.
* [#11133](https://dev.ckeditor.com/ticket/11133): [Page Break](https://ckeditor.com/addon/pagebreak) becomes editable if pasted.
* [#11126](https://dev.ckeditor.com/ticket/11126): Fixed: Native Undo executed once the bottom of the snapshot stack is reached.
* [#11131](https://dev.ckeditor.com/ticket/11131): [Div Editing Area](https://ckeditor.com/addon/divarea): Fixed: Error thrown when switching to source mode if the selection was in widget's nested editable.
* [#11139](https://dev.ckeditor.com/ticket/11139): [Div Editing Area](https://ckeditor.com/addon/divarea): Fixed: Elements Path is not cleared after switching to source mode.
* [#10778](https://dev.ckeditor.com/ticket/10778): Fixed a bug with range enlargement. The range no longer expands to visible whitespace.
* [#11146](https://dev.ckeditor.com/ticket/11146): [IE] Fixed: Preview window switches Internet Explorer to Quirks Mode.
* [#10762](https://dev.ckeditor.com/ticket/10762): [IE] Fixed: JavaScript code displayed in preview window's URL bar.
* [#11186](https://dev.ckeditor.com/ticket/11186): Introduced the [`widgets.repository.addUpcastCallback`](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget.repository-method-addUpcastCallback) method that allows to block upcasting given element to a widget.
* [#11307](https://dev.ckeditor.com/ticket/11307): Fixed: Paste as Plain Text conflict with the [MooTools](https://mootools.net) library.
* [#11140](https://dev.ckeditor.com/ticket/11140): [IE11] Fixed: Anchors are not draggable.
* [#11379](https://dev.ckeditor.com/ticket/11379): Changed default contents `line-height` to unitless values to avoid huge text overlapping (like in [#9696](https://dev.ckeditor.com/ticket/9696)).
* [#10787](https://dev.ckeditor.com/ticket/10787): [Firefox] Fixed: Broken replacement of text while pasting into `div`-based editor.
* [#10884](https://dev.ckeditor.com/ticket/10884): Widgets integration with the [Show Blocks](https://ckeditor.com/addon/showblocks) plugin.
* [#11021](https://dev.ckeditor.com/ticket/11021): Fixed: An error thrown when selecting entire editable contents while fake selection is on.
* [#11086](https://dev.ckeditor.com/ticket/11086): [IE8] Re-enable inline widgets drag&drop in Internet Explorer 8.
* [#11372](https://dev.ckeditor.com/ticket/11372): Widgets: Special characters encoded twice in nested editables.
* [#10068](https://dev.ckeditor.com/ticket/10068): Fixed: Support for protocol-relative URLs.
* [#11283](https://dev.ckeditor.com/ticket/11283): [Enhanced Image](https://ckeditor.com/addon/image2): A `<div>` element with `text-align: center` and an image inside is not recognised correctly.
* [#11196](https://dev.ckeditor.com/ticket/11196): [Accessibility Instructions](https://ckeditor.com/addon/a11yhelp): Allowed additional keyboard button labels to be translated in the dialog window.

## CKEditor 4.3.1

**Important Notes:**

* To match the naming convention, the `language` button is now `Language` ([#11201](https://dev.ckeditor.com/ticket/11201)).
* [Enhanced Image](https://ckeditor.com/addon/image2) button, context menu, command, and icon names match those of the [Image](https://ckeditor.com/addon/image) plugin ([#11222](https://dev.ckeditor.com/ticket/11222)).

Fixed Issues:

* [#11244](https://dev.ckeditor.com/ticket/11244): Changed: The [`widget.repository.checkWidgets()`](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget.repository-method-checkWidgets) method now fires the [`widget.repository.checkWidgets`](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget.repository-event-checkWidgets) event, so from CKEditor 4.3.1 it is preferred to use the method rather than fire the event.
* [#11171](https://dev.ckeditor.com/ticket/11171): Fixed: [`editor.insertElement()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertElement) and [`editor.insertText()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText) methods do not call the [`widget.repository.checkWidgets()`](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget.repository-method-checkWidgets) method.
* [#11085](https://dev.ckeditor.com/ticket/11085): [IE8] Replaced preview generated by the [Mathematical Formulas](https://ckeditor.com/addon/mathjax) widget with a placeholder.
* [#11044](https://dev.ckeditor.com/ticket/11044): Enhanced WAI-ARIA support for the [Language](https://ckeditor.com/addon/language) plugin drop-down menu.
* [#11075](https://dev.ckeditor.com/ticket/11075): With drop-down menu button focused, pressing the *Down Arrow* key will now open the menu and focus its first option.
* [#11165](https://dev.ckeditor.com/ticket/11165): Fixed: The [File Browser](https://ckeditor.com/addon/filebrowser) plugin cannot be removed from the editor.
* [#11159](https://dev.ckeditor.com/ticket/11159): [IE9-10] [Enhanced Image](https://ckeditor.com/addon/image2): Fixed buggy discovery of image dimensions.
* [#11101](https://dev.ckeditor.com/ticket/11101): Drop-down lists no longer break when given double quotes.
* [#11077](https://dev.ckeditor.com/ticket/11077): [Enhanced Image](https://ckeditor.com/addon/image2): Empty undo step recorded when resizing the image.
* [#10853](https://dev.ckeditor.com/ticket/10853): [Enhanced Image](https://ckeditor.com/addon/image2): Widget has paragraph wrapper when de-captioning unaligned image.
* [#11198](https://dev.ckeditor.com/ticket/11198): Widgets: Drag handler is not fully visible when an inline widget is in a heading.
* [#11132](https://dev.ckeditor.com/ticket/11132): [Firefox] Fixed: Caret is lost after drag and drop of an inline widget.
* [#11182](https://dev.ckeditor.com/ticket/11182): [IE10-11] Fixed: Editor crashes (IE11) or works with minor issues (IE10) if a page is loaded in Quirks Mode. See [`env.quirks`](https://docs.ckeditor.com/#!/api/CKEDITOR.env-property-quirks) for more details.
* [#11204](https://dev.ckeditor.com/ticket/11204): Added `figure` and `figcaption` styles to the `contents.css` file so [Enhanced Image](https://ckeditor.com/addon/image2) looks nicer.
* [#11202](https://dev.ckeditor.com/ticket/11202): Fixed: No newline in [BBCode](https://ckeditor.com/addon/bbcode) mode.
* [#10890](https://dev.ckeditor.com/ticket/10890): Fixed: Error thrown when pressing the *Delete* key in a list item.
* [#10055](https://dev.ckeditor.com/ticket/10055): [IE8-10] Fixed: *Delete* pressed on a selected image causes the browser to go back.
* [#11183](https://dev.ckeditor.com/ticket/11183): Fixed: Inserting a horizontal rule or a table in multiple row selection causes a browser crash. Additionally, the [`editor.insertElement()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertElement) method does not insert the element into every range of a selection any more.
* [#11042](https://dev.ckeditor.com/ticket/11042): Fixed: Selection made on an element containing a non-editable element was not auto faked.
* [#11125](https://dev.ckeditor.com/ticket/11125): Fixed: Keyboard navigation through menu and drop-down items will now cycle.
* [#11011](https://dev.ckeditor.com/ticket/11011): Fixed: The [`editor.applyStyle()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-applyStyle) method removes attributes from nested elements.
* [#11179](https://dev.ckeditor.com/ticket/11179): Fixed: [`editor.destroy()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-destroy) does not cleanup content generated by the [Table Resize](https://ckeditor.com/addon/tableresize) plugin for inline editors.
* [#11237](https://dev.ckeditor.com/ticket/11237): Fixed: Table border attribute value is deleted when pasting content from Microsoft Word.
* [#11250](https://dev.ckeditor.com/ticket/11250): Fixed: HTML entities inside the `<textarea>` element are not encoded.
* [#11260](https://dev.ckeditor.com/ticket/11260): Fixed: Initially disabled buttons are not read by JAWS as disabled.
* [#11200](https://dev.ckeditor.com/ticket/11200):  Added [Clipboard](https://ckeditor.com/addon/clipboard) plugin as a dependency for [Widget](https://ckeditor.com/addon/widget) to fix drag and drop.

## CKEditor 4.3

New Features:

* [#10612](https://dev.ckeditor.com/ticket/10612): Internet Explorer 11 support.
* [#10869](https://dev.ckeditor.com/ticket/10869): Widgets: Added better integration with the [Elements Path](https://ckeditor.com/addon/elementspath) plugin.
* [#10886](https://dev.ckeditor.com/ticket/10886): Widgets: Added tooltip to the drag handle.
* [#10933](https://dev.ckeditor.com/ticket/10933): Widgets: Introduced drag and drop of block widgets with the [Line Utilities](https://ckeditor.com/addon/lineutils) plugin.
* [#10936](https://dev.ckeditor.com/ticket/10936): Widget System changes for easier integration with other dialog systems.
* [#10895](https://dev.ckeditor.com/ticket/10895): [Enhanced Image](https://ckeditor.com/addon/image2): Added file browser integration.
* [#11002](https://dev.ckeditor.com/ticket/11002): Added the [`draggable`](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget.definition-property-draggable) option to disable drag and drop support for widgets.
* [#10937](https://dev.ckeditor.com/ticket/10937): [Mathematical Formulas](https://ckeditor.com/addon/mathjax) widget improvements:
  * loading indicator ([#10948](https://dev.ckeditor.com/ticket/10948)),
  * applying paragraph changes (like font color change) to iframe ([#10841](https://dev.ckeditor.com/ticket/10841)),
  * Firefox and IE9 clipboard fixes ([#10857](https://dev.ckeditor.com/ticket/10857)),
  * fixing same origin policy issue ([#10840](https://dev.ckeditor.com/ticket/10840)),
  * fixing undo bugs ([#10842](https://dev.ckeditor.com/ticket/10842), [#10930](https://dev.ckeditor.com/ticket/10930)),
  * fixing other minor bugs.
* [#10862](https://dev.ckeditor.com/ticket/10862): [Placeholder](https://ckeditor.com/addon/placeholder) plugin was rewritten as a widget.
* [#10822](https://dev.ckeditor.com/ticket/10822): Added styles system integration with non-editable elements (for example widgets) and their nested editables. Styles cannot change non-editable content and are applied in nested editable only if allowed by its type and content filter.
* [#10856](https://dev.ckeditor.com/ticket/10856): Menu buttons will now toggle the visibility of their panels when clicked multiple times. [Language](https://ckeditor.com/addon/language) plugin fixes: Added active language highlighting, added an option to remove the language.
* [#10028](https://dev.ckeditor.com/ticket/10028): New [`config.dialog_noConfirmCancel`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-dialog_noConfirmCancel) configuration option that eliminates the need to confirm closing of a dialog window when the user changed any of its fields.
* [#10848](https://dev.ckeditor.com/ticket/10848): Integrate remaining plugins ([Styles](https://ckeditor.com/addon/stylescombo), [Format](https://ckeditor.com/addon/format), [Font](https://ckeditor.com/addon/font), [Color Button](https://ckeditor.com/addon/colorbutton), [Language](https://ckeditor.com/addon/language) and [Indent](https://ckeditor.com/addon/indent)) with [active filter](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-activeFilter).
* [#10855](https://dev.ckeditor.com/ticket/10855): Change the extension of emoticons in the [BBCode](https://ckeditor.com/addon/bbcode) sample from GIF to PNG.

Fixed Issues:

* [#10831](https://dev.ckeditor.com/ticket/10831): [Enhanced Image](https://ckeditor.com/addon/image2): Merged `image2inline` and `image2block` into one `image2` widget.
* [#10835](https://dev.ckeditor.com/ticket/10835): [Enhanced Image](https://ckeditor.com/addon/image2): Improved visibility of the resize handle.
* [#10836](https://dev.ckeditor.com/ticket/10836): [Enhanced Image](https://ckeditor.com/addon/image2): Preserve custom mouse cursor while resizing the image.
* [#10939](https://dev.ckeditor.com/ticket/10939): [Firefox] [Enhanced Image](https://ckeditor.com/addon/image2): hovering the image causes it to change.
* [#10866](https://dev.ckeditor.com/ticket/10866): Fixed: Broken *Tab* key navigation in the [Enhanced Image](https://ckeditor.com/addon/image2) dialog window.
* [#10833](https://dev.ckeditor.com/ticket/10833): Fixed: *Lock ratio* option should be on by default in the [Enhanced Image](https://ckeditor.com/addon/image2) dialog window.
* [#10881](https://dev.ckeditor.com/ticket/10881): Various improvements to *Enter* key behavior in nested editables.
* [#10879](https://dev.ckeditor.com/ticket/10879): [Remove Format](https://ckeditor.com/addon/removeformat) should not leak from a nested editable.
* [#10877](https://dev.ckeditor.com/ticket/10877): Fixed: [WebSpellChecker](https://ckeditor.com/addon/wsc) fails to apply changes if a nested editable was focused.
* [#10877](https://dev.ckeditor.com/ticket/10877): Fixed: [SCAYT](https://ckeditor.com/addon/wsc) blocks typing in nested editables.
* [#11079](https://dev.ckeditor.com/ticket/11079): Add button icons to the [Placeholder](https://ckeditor.com/addon/placeholder) sample.
* [#10870](https://dev.ckeditor.com/ticket/10870): The `paste` command is no longer being disabled when the clipboard is empty.
* [#10854](https://dev.ckeditor.com/ticket/10854): Fixed: Firefox prepends `<br>` to `<body>`, so it is stripped by the HTML data processor.
* [#10823](https://dev.ckeditor.com/ticket/10823): Fixed: [Link](https://ckeditor.com/addon/link) plugin does not work with non-editable content.
* [#10828](https://dev.ckeditor.com/ticket/10828): [Magic Line](https://ckeditor.com/addon/magicline) integration with the Widget System.
* [#10865](https://dev.ckeditor.com/ticket/10865): Improved hiding copybin, so copying widgets works smoothly.
* [#11066](https://dev.ckeditor.com/ticket/11066): Widget's private parts use CSS reset.
* [#11027](https://dev.ckeditor.com/ticket/11027): Fixed: Block commands break on widgets; added the [`contentDomInvalidated`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-contentDomInvalidated) event.
* [#10430](https://dev.ckeditor.com/ticket/10430): Resolve dependence of the [Image](https://ckeditor.com/addon/image) plugin on the [Form Elements](https://ckeditor.com/addon/forms) plugin.
* [#10911](https://dev.ckeditor.com/ticket/10911): Fixed: Browser *Alt* hotkeys will no longer be blocked while a widget is focused.
* [#11082](https://dev.ckeditor.com/ticket/11082): Fixed: Selected widget is not copied or cut when using toolbar buttons or context menu.
* [#11083](https://dev.ckeditor.com/ticket/11083): Fixed list and div element application to block widgets.
* [#10887](https://dev.ckeditor.com/ticket/10887): Internet Explorer 8 compatibility issues related to the Widget System.
* [#11074](https://dev.ckeditor.com/ticket/11074): Temporarily disabled inline widget drag and drop, because of seriously buggy native `range#moveToPoint` method.
* [#11098](https://dev.ckeditor.com/ticket/11098): Fixed: Wrong selection position after undoing widget drag and drop.
* [#11110](https://dev.ckeditor.com/ticket/11110): Fixed: IFrame and Flash objects are being incorrectly pasted in certain conditions.
* [#11129](https://dev.ckeditor.com/ticket/11129): Page break is lost when loading data.
* [#11123](https://dev.ckeditor.com/ticket/11123): [Firefox] Widget is destroyed after being dragged outside of `<body>`.
* [#11124](https://dev.ckeditor.com/ticket/11124): Fixed the [Elements Path](https://ckeditor.com/addon/elementspath) in an editor using the [Div Editing Area](https://ckeditor.com/addon/divarea).

## CKEditor 4.3 Beta

New Features:

* [#9764](https://dev.ckeditor.com/ticket/9764): Widget System.
  * [Widget plugin](https://ckeditor.com/addon/widget) introducing the [Widget API](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget).
  * New [`editor.enterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-enterMode) and [`editor.shiftEnterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-shiftEnterMode) properties &ndash; normalized versions of [`config.enterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-enterMode) and [`config.shiftEnterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-shiftEnterMode).
  * Dynamic editor settings. Starting from CKEditor 4.3 Beta, *Enter* mode values and [content filter](https://docs.ckeditor.com/#!/guide/dev_advanced_content_filter) instances may be changed dynamically (for example when the caret was placed in an element in which editor features should be adjusted). When you are implementing a new editor feature, you should base its behavior on [dynamic](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-activeEnterMode) or [static](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-enterMode) *Enter* mode values depending on whether this feature works in selection context or globally on editor content.
      * Dynamic *Enter* mode values &ndash; [`editor.setActiveEnterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setActiveEnterMode) method, [`editor.activeEnterModeChange`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-activeEnterModeChange) event, and two properties: [`editor.activeEnterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-activeEnterMode) and [`editor.activeShiftEnterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-activeShiftEnterMode).
      * Dynamic content filter instances &ndash; [`editor.setActiveFilter`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setActiveFilter) method, [`editor.activeFilterChange`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-activeFilterChange) event, and [`editor.activeFilter`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-activeFilter) property.
  * "Fake" selection was introduced. It makes it possible to virtually select any element when the real selection remains hidden. See the  [`selection.fake`](https://docs.ckeditor.com/#!/api/CKEDITOR.dom.selection-method-fake) method.
  * Default [`htmlParser.filter`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.filter) rules are not applied to non-editable elements (elements with `contenteditable` attribute set to `false` and their descendants) anymore. To add a rule which will be applied to all elements you need to pass an additional argument to the [`filter.addRules`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.filter-method-addRules) method.
  * Dozens of new methods were introduced &ndash; most interesting ones:
      * [`document.find`](https://docs.ckeditor.com/#!/api/CKEDITOR.dom.document-method-find),
      * [`document.findOne`](https://docs.ckeditor.com/#!/api/CKEDITOR.dom.document-method-findOne),
      * [`editable.insertElementIntoRange`](https://docs.ckeditor.com/#!/api/CKEDITOR.editable-method-insertElementIntoRange),
      * [`range.moveToClosestEditablePosition`](https://docs.ckeditor.com/#!/api/CKEDITOR.dom.range-method-moveToClosestEditablePosition),
      * New methods for [`htmlParser.node`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.node) and [`htmlParser.element`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.element).
* [#10659](https://dev.ckeditor.com/ticket/10659): New [Enhanced Image](https://ckeditor.com/addon/image2) plugin that introduces a widget with integrated image captions, an option to center images, and dynamic "click and drag" resizing.
* [#10664](https://dev.ckeditor.com/ticket/10664): New [Mathematical Formulas](https://ckeditor.com/addon/mathjax) plugin that introduces the MathJax widget.
* [#7987](https://dev.ckeditor.com/ticket/7987): New [Language](https://ckeditor.com/addon/language) plugin that implements Language toolbar button to support [WCAG 3.1.2 Language of Parts](https://www.w3.org/TR/UNDERSTANDING-WCAG20/meaning-other-lang-id.html).
* [#10708](https://dev.ckeditor.com/ticket/10708): New [smileys](https://ckeditor.com/addon/smiley).

## CKEditor 4.2.3

Fixed Issues:

* [#10994](https://dev.ckeditor.com/ticket/10994): Fixed: Loading external jQuery library when opening the [jQuery Adapter](https://docs.ckeditor.com/#!/guide/dev_jquery) sample directly from file.
* [#10975](https://dev.ckeditor.com/ticket/10975): [IE] Fixed: Error thrown while opening the color palette.
* [#9929](https://dev.ckeditor.com/ticket/9929): [Blink/WebKit] Fixed: A non-breaking space is created once a character is deleted and a regular space is typed.
* [#10963](https://dev.ckeditor.com/ticket/10963): Fixed: JAWS issue with the keyboard shortcut for [Magic Line](https://ckeditor.com/addon/magicline).
* [#11096](https://dev.ckeditor.com/ticket/11096): Fixed: TypeError: Object has no method 'is'.

## CKEditor 4.2.2

Fixed Issues:

* [#9314](https://dev.ckeditor.com/ticket/9314): Fixed: Incorrect error message on closing a dialog window without saving changs.
* [#10308](https://dev.ckeditor.com/ticket/10308): [IE10] Fixed: Unspecified error when deleting a row.
* [#10945](https://dev.ckeditor.com/ticket/10945): [Chrome] Fixed: Clicking with a mouse inside the editor does not show the caret.
* [#10912](https://dev.ckeditor.com/ticket/10912): Prevent default action when content of a non-editable link is clicked.
* [#10913](https://dev.ckeditor.com/ticket/10913): Fixed [`CKEDITOR.plugins.addExternal`](https://docs.ckeditor.com/#!/api/CKEDITOR.resourceManager-method-addExternal) not handling paths including file name specified.
* [#10666](https://dev.ckeditor.com/ticket/10666): Fixed [`CKEDITOR.tools.isArray`](https://docs.ckeditor.com/#!/api/CKEDITOR.tools-method-isArray) not working cross frame.
* [#10910](https://dev.ckeditor.com/ticket/10910): [IE9] Fixed JavaScript error thrown in Compatibility Mode when clicking and/or typing in the editing area.
* [#10868](https://dev.ckeditor.com/ticket/10868): [IE8] Prevent the browser from crashing when applying the Inline Quotation style.
* [#10915](https://dev.ckeditor.com/ticket/10915): Fixed: Invalid CSS filter in the Kama skin.
* [#10914](https://dev.ckeditor.com/ticket/10914): Plugins [Indent List](https://ckeditor.com/addon/indentlist) and [Indent Block](https://ckeditor.com/addon/indentblock) are now included in the build configuration.
* [#10812](https://dev.ckeditor.com/ticket/10812): Fixed [`range#createBookmark2`](https://docs.ckeditor.com/#!/api/CKEDITOR.dom.range-method-createBookmark2) incorrectly normalizing offsets. This bug was causing many issues: [#10850](https://dev.ckeditor.com/ticket/10850), [#10842](https://dev.ckeditor.com/ticket/10842).
* [#10951](https://dev.ckeditor.com/ticket/10951): Reviewed and optimized focus handling on panels (combo, menu buttons, color buttons, and context menu) to enhance accessibility. Fixed [#10705](https://dev.ckeditor.com/ticket/10705), [#10706](https://dev.ckeditor.com/ticket/10706) and [#10707](https://dev.ckeditor.com/ticket/10707).
* [#10704](https://dev.ckeditor.com/ticket/10704): Fixed a JAWS issue with the Select Color dialog window title not being announced.
* [#10753](https://dev.ckeditor.com/ticket/10753): The floating toolbar in inline instances now has a dedicated accessibility label.

## CKEditor 4.2.1

Fixed Issues:

* [#10301](https://dev.ckeditor.com/ticket/10301): [IE9-10] Undo fails after 3+ consecutive paste actions with a JavaScript error.
* [#10689](https://dev.ckeditor.com/ticket/10689): Save toolbar button saves only the first editor instance.
* [#10368](https://dev.ckeditor.com/ticket/10368): Move language reading direction definition (`dir`) from main language file to core.
* [#9330](https://dev.ckeditor.com/ticket/9330): Fixed pasting anchors from MS Word.
* [#8103](https://dev.ckeditor.com/ticket/8103): Fixed pasting nested lists from MS Word.
* [#9958](https://dev.ckeditor.com/ticket/9958): [IE9] Pressing the "OK" button will trigger the `onbeforeunload` event in the popup dialog.
* [#10662](https://dev.ckeditor.com/ticket/10662): Fixed styles from the Styles drop-down list not registering to the ACF in case when the [Shared Spaces plugin](https://ckeditor.com/addon/sharedspace) is used.
* [#9654](https://dev.ckeditor.com/ticket/9654): Problems with Internet Explorer 10 Quirks Mode.
* [#9816](https://dev.ckeditor.com/ticket/9816): Floating toolbar does not reposition vertically in several cases.
* [#10646](https://dev.ckeditor.com/ticket/10646): Removing a selected sublist or nested table with *Backspace/Delete* removes the parent element.
* [#10623](https://dev.ckeditor.com/ticket/10623): [WebKit] Page is scrolled when opening a drop-down list.
* [#10004](https://dev.ckeditor.com/ticket/10004): [ChromeVox] Button names are not announced.
* [#10731](https://dev.ckeditor.com/ticket/10731): [WebSpellChecker](https://ckeditor.com/addon/wsc) plugin breaks cloning of editor configuration.
* It is now possible to set per instance [WebSpellChecker](https://ckeditor.com/addon/wsc) plugin configuration instead of setting the configuration globally.

## CKEditor 4.2

**Important Notes:**

* Dropped compatibility support for Internet Explorer 7 and Firefox 3.6.

* Both the Basic and the Standard distribution packages will not contain the new [Indent Block](https://ckeditor.com/addon/indentblock) plugin. Because of this the [Advanced Content Filter](https://docs.ckeditor.com/#!/guide/dev_advanced_content_filter) might remove block indentations from existing contents. If you want to prevent this, either [add an appropriate ACF rule to your filter](https://docs.ckeditor.com/#!/guide/dev_allowed_content_rules) or create a custom build based on the Basic/Standard package and add the Indent Block plugin in [CKBuilder](https://ckeditor.com/builder).

New Features:

* [#10027](https://dev.ckeditor.com/ticket/10027): Separated list and block indentation into two plugins: [Indent List](https://ckeditor.com/addon/indentlist) and [Indent Block](https://ckeditor.com/addon/indentblock).
* [#8244](https://dev.ckeditor.com/ticket/8244): Use *(Shift+)Tab* to indent and outdent lists.
* [#10281](https://dev.ckeditor.com/ticket/10281): The [jQuery Adapter](https://docs.ckeditor.com/#!/guide/dev_jquery) is now available. Several jQuery-related issues fixed: [#8261](https://dev.ckeditor.com/ticket/8261), [#9077](https://dev.ckeditor.com/ticket/9077), [#8710](https://dev.ckeditor.com/ticket/8710), [#8530](https://dev.ckeditor.com/ticket/8530), [#9019](https://dev.ckeditor.com/ticket/9019), [#6181](https://dev.ckeditor.com/ticket/6181), [#7876](https://dev.ckeditor.com/ticket/7876), [#6906](https://dev.ckeditor.com/ticket/6906).
* [#10042](https://dev.ckeditor.com/ticket/10042): Introduced [`config.title`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-title) setting to change the human-readable title of the editor.
* [#9794](https://dev.ckeditor.com/ticket/9794): Added [`editor.onChange`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-change) event.
* [#9923](https://dev.ckeditor.com/ticket/9923): HiDPI support in the editor UI. HiDPI icons for [Moono skin](https://ckeditor.com/addon/moono) added.
* [#8031](https://dev.ckeditor.com/ticket/8031): Handle `required` attributes on `<textarea>` elements &mdash; introduced [`editor.required`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-required) event.
* [#10280](https://dev.ckeditor.com/ticket/10280): Ability to replace `<textarea>` elements with the inline editor.

Fixed Issues:

* [#10599](https://dev.ckeditor.com/ticket/10599): [Indent](https://ckeditor.com/addon/indent) plugin is no longer required by the [List](https://ckeditor.com/addon/list) plugin.
* [#10370](https://dev.ckeditor.com/ticket/10370): Inconsistency in data events between framed and inline editors.
* [#10438](https://dev.ckeditor.com/ticket/10438): [FF, IE] No selection is done on an editable element on executing [`editor.setData()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData).

## CKEditor 4.1.3

New Features:

* Added new translation: Indonesian.

Fixed Issues:

* [#10644](https://dev.ckeditor.com/ticket/10644): Fixed a critical bug when pasting plain text in Blink-based browsers.
* [#5189](https://dev.ckeditor.com/ticket/5189): [Find/Replace](https://ckeditor.com/addon/find) dialog window: rename "Cancel" button to "Close".
* [#10562](https://dev.ckeditor.com/ticket/10562): [Housekeeping] Unified CSS gradient filter formats in the [Moono](https://ckeditor.com/addon/moono) skin.
* [#10537](https://dev.ckeditor.com/ticket/10537): Advanced Content Filter should register a default rule for [`config.shiftEnterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-shiftEnterMode).
* [#10610](https://dev.ckeditor.com/ticket/10610): [`CKEDITOR.dialog.addIframe()`](https://docs.ckeditor.com/#!/api/CKEDITOR.dialog-static-method-addIframe) incorrectly sets the iframe size in dialog windows.

## CKEditor 4.1.2

New Features:

* Added new translation: Sinhala.

Fixed Issues:

* [#10339](https://dev.ckeditor.com/ticket/10339): Fixed: Error thrown when inserted data was totally stripped out after filtering and processing.
* [#10298](https://dev.ckeditor.com/ticket/10298): Fixed: Data processor breaks attributes containing protected parts.
* [#10367](https://dev.ckeditor.com/ticket/10367): Fixed: [`editable.insertText()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editable-method-insertText) loses characters when `RegExp` replace controls are being inserted.
* [#10165](https://dev.ckeditor.com/ticket/10165): [IE] Access denied error when `document.domain` has been altered.
* [#9761](https://dev.ckeditor.com/ticket/9761): Update the *Backspace* key state in [`keystrokeHandler.blockedKeystrokes`](https://docs.ckeditor.com/#!/api/CKEDITOR.keystrokeHandler-property-blockedKeystrokes) when calling [`editor.setReadOnly()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setReadOnly).
* [#6504](https://dev.ckeditor.com/ticket/6504): Fixed: Race condition while loading several [`config.customConfig`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-customConfig) files.
* [#10146](https://dev.ckeditor.com/ticket/10146): [Firefox] Empty lines are being removed while [`config.enterMode`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-enterMode) is [`CKEDITOR.ENTER_BR`](https://docs.ckeditor.com/#!/api/CKEDITOR-property-ENTER_BR).
* [#10360](https://dev.ckeditor.com/ticket/10360): Fixed: ARIA `role="application"` should not be used for dialog windows.
* [#10361](https://dev.ckeditor.com/ticket/10361): Fixed: ARIA `role="application"` should not be used for floating panels.
* [#10510](https://dev.ckeditor.com/ticket/10510): Introduced unique voice labels to differentiate between different editor instances.
* [#9945](https://dev.ckeditor.com/ticket/9945): [iOS] Scrolling not possible on iPad.
* [#10389](https://dev.ckeditor.com/ticket/10389): Fixed: Invalid HTML in the "Text and Table" template.
* [WebSpellChecker](https://ckeditor.com/addon/wsc) plugin user interface was changed to match CKEditor 4 style.

## CKEditor 4.1.1

New Features:

* Added new translation: Albanian.

Fixed Issues:

* [#10172](https://dev.ckeditor.com/ticket/10172): Pressing *Delete* or *Backspace* in an empty table cell moves the cursor to the next/previous cell.
* [#10219](https://dev.ckeditor.com/ticket/10219): Error thrown when destroying an editor instance in parallel with a `mouseup` event.
* [#10265](https://dev.ckeditor.com/ticket/10265): Wrong loop type in the [File Browser](https://ckeditor.com/addon/filebrowser) plugin.
* [#10249](https://dev.ckeditor.com/ticket/10249): Wrong undo/redo states at start.
* [#10268](https://dev.ckeditor.com/ticket/10268): [Show Blocks](https://ckeditor.com/addon/showblocks) does not recover after switching to Source view.
* [#9995](https://dev.ckeditor.com/ticket/9995): HTML code in the `<textarea>` should not be modified by the [`htmlDataProcessor`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlDataProcessor).
* [#10320](https://dev.ckeditor.com/ticket/10320): [Justify](https://ckeditor.com/addon/justify) plugin should add elements to Advanced Content Filter based on current [Enter mode](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-enterMode).
* [#10260](https://dev.ckeditor.com/ticket/10260): Fixed: Advanced Content Filter blocks [`tabSpaces`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-tabSpaces). Unified `data-cke-*` attributes filtering.
* [#10315](https://dev.ckeditor.com/ticket/10315): [WebKit] [Undo manager](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.undo.UndoManager) should not record snapshots after a filling character was added/removed.
* [#10291](https://dev.ckeditor.com/ticket/10291): [WebKit] Space after a filling character should be secured.
* [#10330](https://dev.ckeditor.com/ticket/10330): [WebKit] The filling character is not removed on `keydown` in specific cases.
* [#10285](https://dev.ckeditor.com/ticket/10285): Fixed: Styled text pasted from MS Word causes an infinite loop.
* [#10131](https://dev.ckeditor.com/ticket/10131): Fixed: [`undoManager.update()`](https://docs.ckeditor.com/#!/api/CKEDITOR.plugins.undo.UndoManager-method-update) does not refresh the command state.
* [#10337](https://dev.ckeditor.com/ticket/10337): Fixed: Unable to remove `<s>` using [Remove Format](https://ckeditor.com/addon/removeformat).

## CKEditor 4.1

Fixed Issues:

* [#10192](https://dev.ckeditor.com/ticket/10192): Closing lists with the *Enter* key does not work with [Advanced Content Filter](https://docs.ckeditor.com/#!/guide/dev_advanced_content_filter) in several cases.
* [#10191](https://dev.ckeditor.com/ticket/10191): Fixed allowed content rules unification, so the [`filter.allowedContent`](https://docs.ckeditor.com/#!/api/CKEDITOR.filter-property-allowedContent) property always contains rules in the same format.
* [#10224](https://dev.ckeditor.com/ticket/10224): Advanced Content Filter does not remove non-empty `<a>` elements anymore.
* Minor issues in plugin integration with Advanced Content Filter:
  * [#10166](https://dev.ckeditor.com/ticket/10166): Added transformation from the `align` attribute to `float` style to preserve backward compatibility after the introduction of Advanced Content Filter.
  * [#10195](https://dev.ckeditor.com/ticket/10195): [Image](https://ckeditor.com/addon/image) plugin no longer registers rules for links to Advanced Content Filter.
  * [#10213](https://dev.ckeditor.com/ticket/10213): [Justify](https://ckeditor.com/addon/justify) plugin is now correctly registering rules to Advanced Content Filter when [`config.justifyClasses`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-justifyClasses) is defined.

## CKEditor 4.1 RC

New Features:

* [#9829](https://dev.ckeditor.com/ticket/9829): Advanced Content Filter - data and features activation based on editor configuration.

  Brand new data filtering system that works in 2 modes:

  * Based on loaded features (toolbar items, plugins) - the data will be filtered according to what the editor in its
  current configuration can handle.
  * Based on [`config.allowedContent`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-allowedContent) rules - the data
  will be filtered and the editor features (toolbar items, commands, keystrokes) will be enabled if they are allowed.

  See the `datafiltering.html` sample, [guides](https://docs.ckeditor.com/#!/guide/dev_advanced_content_filter) and [`CKEDITOR.filter` API documentation](https://docs.ckeditor.com/#!/api/CKEDITOR.filter).
* [#9387](https://dev.ckeditor.com/ticket/9387): Reintroduced [Shared Spaces](https://ckeditor.com/addon/sharedspace) - the ability to display toolbar and bottom editor space in selected locations and to share them by different editor instances.
* [#9907](https://dev.ckeditor.com/ticket/9907): Added the [`contentPreview`](https://docs.ckeditor.com/#!/api/CKEDITOR-event-contentPreview) event for preview data manipulation.
* [#9713](https://dev.ckeditor.com/ticket/9713): Introduced the [Source Dialog](https://ckeditor.com/addon/sourcedialog) plugin that brings raw HTML editing for inline editor instances.
* Included in [#9829](https://dev.ckeditor.com/ticket/9829): Introduced new events, [`toHtml`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-toHtml) and [`toDataFormat`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-toDataFormat), allowing for better integration with data processing.
* [#9981](https://dev.ckeditor.com/ticket/9981): Added ability to filter [`htmlParser.fragment`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.fragment), [`htmlParser.element`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.element) etc. by many [`htmlParser.filter`](https://docs.ckeditor.com/#!/api/CKEDITOR.htmlParser.filter)s before writing structure to an HTML string.
* Included in [#10103](https://dev.ckeditor.com/ticket/10103):
  * Introduced the [`editor.status`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-status) property to make it easier to check the current status of the editor.
  * Default [`command`](https://docs.ckeditor.com/#!/api/CKEDITOR.command) state is now [`CKEDITOR.TRISTATE_DISABLE`](https://docs.ckeditor.com/#!/api/CKEDITOR-property-TRISTATE_DISABLED). It will be activated on [`editor.instanceReady`](https://docs.ckeditor.com/#!/api/CKEDITOR-event-instanceReady) or immediately after being added if the editor is already initialized.
* [#9796](https://dev.ckeditor.com/ticket/9796): Introduced `<s>` as a default tag for strikethrough, which replaces obsolete `<strike>` in HTML5.

## CKEditor 4.0.3

Fixed Issues:

* [#10196](https://dev.ckeditor.com/ticket/10196): Fixed context menus not opening with keyboard shortcuts when [Autogrow](https://ckeditor.com/addon/autogrow) is enabled.
* [#10212](https://dev.ckeditor.com/ticket/10212): [IE7-10] Undo command throws errors after multiple switches between Source and WYSIWYG view.
* [#10219](https://dev.ckeditor.com/ticket/10219): [Inline editor] Error thrown after calling [`editor.destroy()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-destroy).

## CKEditor 4.0.2

Fixed Issues:

* [#9779](https://dev.ckeditor.com/ticket/9779): Fixed overriding [`CKEDITOR.getUrl()`](https://docs.ckeditor.com/#!/api/CKEDITOR-method-getUrl) with `CKEDITOR_GETURL`.
* [#9772](https://dev.ckeditor.com/ticket/9772): Custom buttons in the dialog window footer have different look and size ([Moono](https://ckeditor.com/addon/moono), [Kama](https://ckeditor.com/addon/kama) skins).
* [#9029](https://dev.ckeditor.com/ticket/9029): Custom styles added with the [`stylesSet.add()`](https://docs.ckeditor.com/#!/api/CKEDITOR.stylesSet-method-add) are displayed in the wrong order.
* [#9887](https://dev.ckeditor.com/ticket/9887): Disable [Magic Line](https://ckeditor.com/addon/magicline) when [`editor.readOnly`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-property-readOnly) is set.
* [#9882](https://dev.ckeditor.com/ticket/9882): Fixed empty document title on [`editor.getData()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData) if set via the Document Properties dialog window.
* [#9773](https://dev.ckeditor.com/ticket/9773): Fixed rendering problems with selection fields in the Kama skin.
* [#9851](https://dev.ckeditor.com/ticket/9851): The [`selectionChange`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-event-selectionChange) event is not fired when mouse selection ended outside editable.
* [#9903](https://dev.ckeditor.com/ticket/9903): [Inline editor] Bad positioning of floating space with page horizontal scroll.
* [#9872](https://dev.ckeditor.com/ticket/9872): [`editor.checkDirty()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty) returns `true` when called onload. Removed the obsolete `editor.mayBeDirty` flag.
* [#9893](https://dev.ckeditor.com/ticket/9893): [IE] Fixed broken toolbar when editing mixed direction content in Quirks mode.
* [#9845](https://dev.ckeditor.com/ticket/9845): Fixed TAB navigation in the [Link](https://ckeditor.com/addon/link) dialog window when the Anchor option is used and no anchors are available.
* [#9883](https://dev.ckeditor.com/ticket/9883): Maximizing was making the entire page editable with [divarea](https://ckeditor.com/addon/divarea)-based editors.
* [#9940](https://dev.ckeditor.com/ticket/9940): [Firefox] Navigating back to a page with the editor was making the entire page editable.
* [#9966](https://dev.ckeditor.com/ticket/9966): Fixed: Unable to type square brackets with French keyboard layout. Changed [Magic Line](https://ckeditor.com/addon/magicline) keystrokes.
* [#9507](https://dev.ckeditor.com/ticket/9507): [Firefox] Selection is moved before editable position when the editor is focused for the first time.
* [#9947](https://dev.ckeditor.com/ticket/9947): [WebKit] Editor overflows parent container in some edge cases.
* [#10105](https://dev.ckeditor.com/ticket/10105): Fixed: Broken [sourcearea](https://ckeditor.com/addon/sourcearea) view when an RTL language is set.
* [#10123](https://dev.ckeditor.com/ticket/10123): [WebKit] Fixed: Several dialog windows have broken layout since the latest WebKit release.
* [#10152](https://dev.ckeditor.com/ticket/10152): Fixed: Invalid ARIA property used on menu items.

## CKEditor 4.0.1.1

Fixed Issues:

* Security update: Added protection against XSS attack and possible path disclosure in the PHP sample.

## CKEditor 4.0.1

Fixed Issues:

* [#9655](https://dev.ckeditor.com/ticket/9655): Support for IE Quirks Mode in the new [Moono skin](https://ckeditor.com/addon/moono).
* Accessibility issues (mainly in inline editor): [#9364](https://dev.ckeditor.com/ticket/9364), [#9368](https://dev.ckeditor.com/ticket/9368), [#9369](https://dev.ckeditor.com/ticket/9369), [#9370](https://dev.ckeditor.com/ticket/9370), [#9541](https://dev.ckeditor.com/ticket/9541), [#9543](https://dev.ckeditor.com/ticket/9543), [#9841](https://dev.ckeditor.com/ticket/9841), [#9844](https://dev.ckeditor.com/ticket/9844).
* [Magic Line](https://ckeditor.com/addon/magicline) plugin:
    * [#9481](https://dev.ckeditor.com/ticket/9481): Added accessibility support for Magic Line.
    * [#9509](https://dev.ckeditor.com/ticket/9509): Added Magic Line support for forms.
    * [#9573](https://dev.ckeditor.com/ticket/9573): Magic Line does not disappear on `mouseout` in a specific case.
* [#9754](https://dev.ckeditor.com/ticket/9754): [WebKit] Cutting & pasting simple unformatted text generates an inline wrapper in WebKit browsers.
* [#9456](https://dev.ckeditor.com/ticket/9456): [Chrome] Properly paste bullet list style from MS Word.
* [#9699](https://dev.ckeditor.com/ticket/9699), [#9758](https://dev.ckeditor.com/ticket/9758): Improved selection locking when selecting by dragging.
* Context menu:
    * [#9712](https://dev.ckeditor.com/ticket/9712): Opening the context menu destroys editor focus.
    * [#9366](https://dev.ckeditor.com/ticket/9366): Context menu should be displayed over the floating toolbar.
    * [#9706](https://dev.ckeditor.com/ticket/9706): Context menu generates a JavaScript error in inline mode when the editor is attached to a header element.
* [#9800](https://dev.ckeditor.com/ticket/9800): Hide float panel when resizing the window.
* [#9721](https://dev.ckeditor.com/ticket/9721): Padding in content of div-based editor puts the editing area under the bottom UI space.
* [#9528](https://dev.ckeditor.com/ticket/9528): Host page `box-sizing` style should not influence the editor UI elements.
* [#9503](https://dev.ckeditor.com/ticket/9503): [Form Elements](https://ckeditor.com/addon/forms) plugin adds context menu listeners only on supported input types. Added support for `tel`, `email`, `search` and `url` input types.
* [#9769](https://dev.ckeditor.com/ticket/9769): Improved floating toolbar positioning in a narrow window.
* [#9875](https://dev.ckeditor.com/ticket/9875): Table dialog window does not populate width correctly.
* [#8675](https://dev.ckeditor.com/ticket/8675): Deleting cells in a nested table removes the outer table cell.
* [#9815](https://dev.ckeditor.com/ticket/9815): Cannot edit dialog window fields in an editor initialized in the jQuery UI modal dialog.
* [#8888](https://dev.ckeditor.com/ticket/8888): CKEditor dialog windows do not show completely in a small window.
* [#9360](https://dev.ckeditor.com/ticket/9360): [Inline editor] Blocks shown for a `<div>` element stay permanently even after the user exits editing the `<div>`.
* [#9531](https://dev.ckeditor.com/ticket/9531): [Firefox & Inline editor] Toolbar is lost when closing the Format drop-down list by clicking its button.
* [#9553](https://dev.ckeditor.com/ticket/9553): Table width incorrectly set when the `border-width` style is specified.
* [#9594](https://dev.ckeditor.com/ticket/9594): Cannot tab past CKEditor when it is in read-only mode.
* [#9658](https://dev.ckeditor.com/ticket/9658): [IE9] Justify not working on selected images.
* [#9686](https://dev.ckeditor.com/ticket/9686): Added missing contents styles for `<pre>` elements.
* [#9709](https://dev.ckeditor.com/ticket/9709): [Paste from Word](https://ckeditor.com/addon/pastefromword) should not depend on configuration from other styles.
* [#9726](https://dev.ckeditor.com/ticket/9726): Removed [Color Dialog](https://ckeditor.com/addon/colordialog) plugin dependency from [Table Tools](https://ckeditor.com/addon/tabletools).
* [#9765](https://dev.ckeditor.com/ticket/9765): Toolbar Collapse command documented incorrectly in the [Accessibility Instructions](https://ckeditor.com/addon/a11yhelp) dialog window.
* [#9771](https://dev.ckeditor.com/ticket/9771): [WebKit & Opera] Fixed scrolling issues when pasting.
* [#9787](https://dev.ckeditor.com/ticket/9787): [IE9] `onChange` is not fired for checkboxes in dialogs.
* [#9842](https://dev.ckeditor.com/ticket/9842): [Firefox 17] When opening a toolbar menu for the first time and pressing the *Down Arrow* key, focus goes to the next toolbar button instead of the menu options.
* [#9847](https://dev.ckeditor.com/ticket/9847): [Elements Path](https://ckeditor.com/addon/elementspath) should not be initialized in the inline editor.
* [#9853](https://dev.ckeditor.com/ticket/9853): [`editor.addRemoveFormatFilter()`](https://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-addRemoveFormatFilter) is exposed before it really works.
* [#8893](https://dev.ckeditor.com/ticket/8893): Value of the [`pasteFromWordCleanupFile`](https://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-pasteFromWordCleanupFile) configuration option is now taken from the instance configuration.
* [#9693](https://dev.ckeditor.com/ticket/9693): Removed "Live Preview" checkbox from UI color picker.


## CKEditor 4.0

The first stable release of the new CKEditor 4 code line.

The CKEditor JavaScript API has been kept compatible with CKEditor 4, whenever
possible. The list of relevant changes can be found in the [API Changes page of
the CKEditor 4 documentation][1].

[1]: https://docs.ckeditor.com/#!/guide/dev_api_changes "API Changes"
