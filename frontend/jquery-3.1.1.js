/*! * jQuery JavaScript Library v3.1.1 * https://jquery.com/ * * Includes Sizzle.js * https://
sizzlejs.com/ * * Copyright jQuery Foundation and other contributors * Released under the MIT
license * https://jquery.org/license * * Date: 2016-09-22T22:30Z */ ( function( global, factory ) {
"use strict"; if ( typeof module === "object" && typeof module.exports === "object" ) { // For
CommonJS and CommonJS-like environments where a proper `window` // is present, execute
the factory and get jQuery. // For environments that do not have a `window` with a `document` /
/ (such as Node.js), expose a factory as module.exports. // This accentuates the need for the
creation of a real `window`. // e.g. var jQuery = require("jquery")(window); // See ticket #14549
for more info. module.exports = global.document ? factory( global, true ) : function( w ) { if
( !w.document ) { throw new Error( "jQuery requires a window with a document" ); } return
factory( w ); }; } else { factory( global ); } // Pass this if window is not defined yet } )( typeof
window !== "undefined" ? window : this, function( window, noGlobal ) { // Edge <= 12 - 13+, Firefox
<=18 - 45+, IE 10 - 11, Safari 5.1 - 9+, iOS 6 - 9.1 // throw exceptions when non-strict code (e.g.,
ASP.NET 4.5) accesses strict mode // arguments.callee.caller (trac-13335). But as of jQuery 3.0
(2016), strict mode should be common // enough that all such attempts are guarded in a try
block. "use strict"; var arr = []; var document = window.document; var getProto =
Object.getPrototypeOf; var slice = arr.slice; var concat = arr.concat; var push = arr.push; var
indexOf = arr.indexOf; var class2type = {}; var toString = class2type.toString; var hasOwn =
class2type.hasOwnProperty; var fnToString = hasOwn.toString; var ObjectFunctionString =
fnToString.call( Object ); var support = {}; function DOMEval( code, doc ) { doc = doc ||
document; var script = doc.createElement( "script" ); script.text = code;
doc.head.appendChild( script ).parentNode.removeChild( script ); } /* global Symbol */ //
Defining this global in .eslintrc.json would create a danger of using the global // unguarded in
another place, it seems safer to define global only for this module var version = "3.1.1", // Define
a local copy of jQuery jQuery = function( selector, context ) { // The jQuery object is actually just
the init constructor 'enhanced' // Need init if jQuery is called (just allow error to be thrown if not
included) return new jQuery.fn.init( selector, context ); }, // Support: Android <=4.0 only // Make
sure we trim BOM and NBSP rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, // Matches dashed
string for camelizing rmsPrefix = /^-ms-/, rdashAlpha = /-([a-z])/g, // Used by jQuery.camelCase
as callback to replace() fcamelCase = function( all, letter ) { return letter.toUpperCase(); };
jQuery.fn = jQuery.prototype = { // The current version of jQuery being used jquery: version,
constructor: jQuery, // The default length of a jQuery object is 0 length: 0, toArray: function() {
return slice.call( this ); }, // Get the Nth element in the matched element set OR // Get the whole
matched element set as a clean array get: function( num ) { // Return all the elements in a clean
array if ( num == null ) { return slice.call( this ); } // Return just the one element from the set
return num < 0 ? this[ num + this.length ] : this[ num ]; }, // Take an array of elements and push it
onto the stack // (returning the new matched element set) pushStack: function( elems ) { //
Build a new jQuery matched element set var ret = jQuery.merge( this.constructor(), elems ); //
Add the old object onto the stack (as a reference) ret.prevObject = this; // Return the newlyformed element set return ret; }, // Execute a callback for every element in the matched set.
each: function( callback ) { return jQuery.each( this, callback ); }, map: function( callback ) {
return this.pushStack( jQuery.map( this, function( elem, i ) { return callback.call( elem, i, elem );
} ) ); }, slice: function() { return this.pushStack( slice.apply( this, arguments ) ); }, first:
function() { return this.eq( 0 ); }, last: function() { return this.eq( -1 ); }, eq: function( i ) { var
len = this.length, j = +i + ( i < 0 ? len : 0 ); return this.pushStack( j >= 0 && j < len ? [ this[ j ] ] : [] );
}, end: function() { return this.prevObject || this.constructor(); }, // For internal use only. //
Behaves like an Array's method, not like a jQuery method. push: push, sort: arr.sort, splice:
arr.splice }; jQuery.extend = jQuery.fn.extend = function() { var options, name, src, copy,
copyIsArray, clone, target = arguments[ 0 ] || {}, i = 1, length = arguments.length, deep = false;
// Handle a deep copy situation if ( typeof target === "boolean" ) { deep = target; // Skip the
boolean and the target target = arguments[ i ] || {}; i++; } // Handle case when target is a string
or something (possible in deep copy) if ( typeof target !== "object" && !jQuery.isFunction( target
) ) { target = {}; } // Extend jQuery itself if only one argument is passed if ( i === length ) {target = this; i--; } for ( ; i < length; i++ ) { // Only deal with non-null/undefined values if ( (
options = arguments[ i ] ) != null ) { // Extend the base object for ( name in options ) { src =
target[ name ]; copy = options[ name ]; // Prevent never-ending loop if ( target === copy ) {
continue; } // Recurse if we're merging plain objects or arrays if ( deep && copy && (
jQuery.isPlainObject( copy ) || ( copyIsArray = jQuery.isArray( copy ) ) ) ) { if ( copyIsArray ) {
copyIsArray = false; clone = src && jQuery.isArray( src ) ? src : []; } else { clone = src &&
jQuery.isPlainObject( src ) ? src : {}; } // Never move original objects, clone them target[
name ] = jQuery.extend( deep, clone, copy ); // Don't bring in undefined values } else if ( copy
!== undefined ) { target[ name ] = copy; } } } } // Return the modified object return target;
}; jQuery.extend( { // Unique for each copy of jQuery on the page expando: "jQuery" + ( version +
Math.random() ).replace( /\D/g, "" ), // Assume jQuery is ready without the ready module
isReady: true, error: function( msg ) { throw new Error( msg ); }, noop: function() {}, isFunction:
function( obj ) { return jQuery.type( obj ) === "function"; }, isArray: Array.isArray, isWindow:
function( obj ) { return obj != null && obj === obj.window; }, isNumeric: function( obj ) { // As of
jQuery 3.0, isNumeric is limited to // strings and numbers (primitives or objects) // that can be
coerced to finite numbers (gh-2662) var type = jQuery.type( obj ); return ( type === "number" ||
type === "string" ) && // parseFloat NaNs numeric-cast false positives ("") // ...but
misinterprets leading-number strings, particularly hex literals ("0x...") // subtraction forces
infinities to NaN !isNaN( obj - parseFloat( obj ) ); }, isPlainObject: function( obj ) { var proto,
Ctor; // Detect obvious negatives // Use toString instead of jQuery.type to catch host objects
if ( !obj || toString.call( obj ) !== "[object Object]" ) { return false; } proto = getProto( obj ); //
Objects with no prototype (e.g., `Object.create( null )`) are plain if ( !proto ) { return true; } //
Objects with prototype are plain iff they were constructed by a global Object function Ctor =
hasOwn.call( proto, "constructor" ) && proto.constructor; return typeof Ctor === "function" &&
fnToString.call( Ctor ) === ObjectFunctionString; }, isEmptyObject: function( obj ) { /* eslintdisable no-unused-vars */ // See https://github.com/eslint/eslint/issues/6125 var name; for (
name in obj ) { return false; } return true; }, type: function( obj ) { if ( obj == null ) { return
obj + ""; } // Support: Android <=2.3 only (functionish RegExp) return typeof obj === "object" ||
typeof obj === "function" ? class2type[ toString.call( obj ) ] || "object" : typeof obj; }, //
Evaluates a script in a global context globalEval: function( code ) { DOMEval( code ); }, //
Convert dashed to camelCase; used by the css and data modules // Support: IE <=9 - 11, Edge
12 - 13 // Microsoft forgot to hump their vendor prefix (#9572) camelCase: function( string ) {
return string.replace( rmsPrefix, "ms-" ).replace( rdashAlpha, fcamelCase ); }, nodeName:
function( elem, name ) { return elem.nodeName && elem.nodeName.toLowerCase() ===
name.toLowerCase(); }, each: function( obj, callback ) { var length, i = 0; if ( isArrayLike( obj ) )
{ length = obj.length; for ( ; i < length; i++ ) { if ( callback.call( obj[ i ], i, obj[ i ] ) === false ) {
break; } } } else { for ( i in obj ) { if ( callback.call( obj[ i ], i, obj[ i ] ) === false ) { break;
} } } return obj; }, // Support: Android <=4.0 only trim: function( text ) { return text == null ?
"" : ( text + "" ).replace( rtrim, "" ); }, // results is for internal usage only makeArray: function( arr,
results ) { var ret = results || []; if ( arr != null ) { if ( isArrayLike( Object( arr ) ) ) {
jQuery.merge( ret, typeof arr === "string" ? [ arr ] : arr ); } else { push.call( ret, arr ); } }
return ret; }, inArray: function( elem, arr, i ) { return arr == null ? -1 : indexOf.call( arr, elem, i ); }, /
/ Support: Android <=4.0 only, PhantomJS 1 only // push.apply(_, arraylike) throws on ancient
WebKit merge: function( first, second ) { var len = +second.length, j = 0, i = first.length; for ( ;
j < len; j++ ) { first[ i++ ] = second[ j ]; } first.length = i; return first; }, grep: function( elems,
callback, invert ) { var callbackInverse, matches = [], i = 0, length = elems.length,
callbackExpect = !invert; // Go through the array, only saving the items // that pass the validator
function for ( ; i < length; i++ ) { callbackInverse = !callback( elems[ i ], i ); if ( callbackInverse
!== callbackExpect ) { matches.push( elems[ i ] ); } } return matches; }, // arg is for internal
usage only map: function( elems, callback, arg ) { var length, value, i = 0, ret = []; // Go
through the array, translating each of the items to their new values if ( isArrayLike( elems ) ) {
length = elems.length; for ( ; i < length; i++ ) { value = callback( elems[ i ], i, arg ); if ( value !=
null ) { ret.push( value ); } } // Go through every key on the object, } else { for ( i in elems) { value = callback( elems[ i ], i, arg ); if ( value != null ) { ret.push( value ); } } } //
Flatten any nested arrays return concat.apply( [], ret ); }, // A global GUID counter for objects
guid: 1, // Bind a function to a context, optionally partially applying any // arguments. proxy:
function( fn, context ) { var tmp, args, proxy; if ( typeof context === "string" ) { tmp = fn[
context ]; context = fn; fn = tmp; } // Quick check to determine if target is callable, in the
spec // this throws a TypeError, but we will just return undefined. if ( !jQuery.isFunction( fn ) ) {
return undefined; } // Simulated bind args = slice.call( arguments, 2 ); proxy = function() {
return fn.apply( context || this, args.concat( slice.call( arguments ) ) ); }; // Set the guid of
unique handler to the same of original handler, so it can be removed proxy.guid = fn.guid =
fn.guid || jQuery.guid++; return proxy; }, now: Date.now, // jQuery.support is not used in Core
but other projects attach their // properties to it so it needs to exist. support: support } ); if (
typeof Symbol === "function" ) { jQuery.fn[ Symbol.iterator ] = arr[ Symbol.iterator ]; } // Populate
the class2type map jQuery.each( "Boolean Number String Function Array Date RegExp Object
Error Symbol".split( " " ), function( i, name ) { class2type[ "[object " + name + "]" ] =
name.toLowerCase(); } ); function isArrayLike( obj ) { // Support: real iOS 8.2 only (not
reproducible in simulator) // `in` check used to prevent JIT error (gh-2145) // hasOwn isn't used
here due to false negatives // regarding Nodelist length in IE var length = !!obj && "length" in obj
&& obj.length, type = jQuery.type( obj ); if ( type === "function" || jQuery.isWindow( obj ) ) {
return false; } return type === "array" || length === 0 || typeof length === "number" && length > 0
&& ( length - 1 ) in obj; } var Sizzle = /*! * Sizzle CSS Selector Engine v2.3.3 * https://sizzlejs.com/
* * Copyright jQuery Foundation and other contributors * Released under the MIT license * http://
jquery.org/license * * Date: 2016-08-08 */ (function( window ) { var i, support, Expr, getText,
isXML, tokenize, compile, select, outermostContext, sortInput, hasDuplicate, // Local
document vars setDocument, document, docElem, documentIsHTML, rbuggyQSA,
rbuggyMatches, matches, contains, // Instance-specific data expando = "sizzle" + 1 * new
Date(), preferredDoc = window.document, dirruns = 0, done = 0, classCache = createCache(),
tokenCache = createCache(), compilerCache = createCache(), sortOrder = function( a, b ) { if (
a === b ) { hasDuplicate = true; } return 0; }, // Instance methods hasOwn =
({}).hasOwnProperty, arr = [], pop = arr.pop, push_native = arr.push, push = arr.push, slice =
arr.slice, // Use a stripped-down indexOf as it's faster than native // https://jsperf.com/thorindexof-vs-for/5 indexOf = function( list, elem ) { var i = 0, len = list.length; for ( ; i < len; i++ ) {
if ( list[i] === elem ) { return i; } } return -1; }, booleans =
"checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple
|open|readonly|required|scoped", // Regular expressions // http://www.w3.org/TR/css3-
selectors/#whitespace whitespace = "[\\x20\\t\\r\\n\\f]", // http://www.w3.org/TR/CSS21/
syndata.html#value-def-identifier identifier = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+", // Attribute selectors:
http://www.w3.org/TR/selectors/#attribute-selectors attributes = "\\[" + whitespace + "*(" +
identifier + ")(?:" + whitespace + // Operator (capture 2) "*([*^$|!~]?=)" + whitespace + //
"Attribute values must be CSS identifiers [capture 5] or strings [capture 3 or capture 4]"
"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + identifier + "))|)" + whitespace + "*\\]", pseudos
= ":(" + identifier + ")(?:\\((" + // To reduce the number of selectors needing tokenize in the
preFilter, prefer arguments: // 1. quoted (capture 3; capture 4 or capture 5)
"('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|" + // 2. simple (capture 6) "((?:\\\\.|[^\\\\()[\\]]|" +
attributes + ")*)|" + // 3. anything else (capture 2) ".*" + ")\\)|)", // Leading and non-escaped
trailing whitespace, capturing some non-whitespace characters preceding the latter
rwhitespace = new RegExp( whitespace + "+", "g" ), rtrim = new RegExp( "^" + whitespace +
"+|((?:^|[^\\\\])(?:\\\\.)*)" + whitespace + "+$", "g" ), rcomma = new RegExp( "^" + whitespace + "*,"
+ whitespace + "*" ), rcombinators = new RegExp( "^" + whitespace + "*([>+~]|" + whitespace + ")"
+ whitespace + "*" ), rattributeQuotes = new RegExp( "=" + whitespace + "*([^\\]'\"]*?)" +
whitespace + "*\\]", "g" ), rpseudo = new RegExp( pseudos ), ridentifier = new RegExp( "^" +
identifier + "$" ), matchExpr = { "ID": new RegExp( "^#(" + identifier + ")" ), "CLASS": new RegExp(
"^\\.(" + identifier + ")" ), "TAG": new RegExp( "^(" + identifier + "|[*])" ), "ATTR": new RegExp( "^" +
attributes ), "PSEUDO": new RegExp( "^" + pseudos ), "CHILD": new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" +
whitespace + "*(?:([+-]|)" + whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i" ), "bool": new
RegExp( "^(?:" + booleans + ")$", "i" ), // For use in libraries implementing .is() // We use this for
POS matching in `select` "needsContext": new RegExp( "^" + whitespace +
"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace + "*((?:-\\d)?\\d*)" + whitespace +
"*\\)|)(?=[^-]|$)", "i" ) }, rinputs = /^(?:input|select|textarea|button)$/i, rheader = /^h\d$/i, rnative =
/^[^{]+\{\s*\[native \w/, // Easily-parseable/retrievable ID or TAG or CLASS selectors rquickExpr
= /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, rsibling = /[+~]/, // CSS escapes // http://www.w3.org/TR/
CSS21/syndata.html#escaped-characters runescape = new RegExp( "\\\\([\\da-f]{1,6}" +
whitespace + "?|(" + whitespace + ")|.)", "ig" ), funescape = function( _, escaped,
escapedWhitespace ) { var high = "0x" + escaped - 0x10000; // NaN means non-codepoint //
Support: Firefox<24 // Workaround erroneous numeric interpretation of +"0x" return high !==
high || escapedWhitespace ? escaped : high < 0 ? // BMP codepoint
String.fromCharCode( high + 0x10000 ) : // Supplemental Plane codepoint (surrogate pair)
String.fromCharCode( high >> 10 | 0xD800, high & 0x3FF | 0xDC00 ); }, // CSS string/identifier
serialization // https://drafts.csswg.org/cssom/#common-serializing-idioms rcssescape = /
([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, fcssescape = function( ch, asCodePoint ) {
if ( asCodePoint ) { // U+0000 NULL becomes U+FFFD REPLACEMENT CHARACTER if ( ch
=== "\0" ) { return "\uFFFD"; } // Control characters and (dependent upon position) numbers
get escaped as code points return ch.slice( 0, -1 ) + "\\" + ch.charCodeAt( ch.length - 1
).toString( 16 ) + " "; } // Other potentially-special ASCII characters get backslash-escaped
return "\\" + ch; }, // Used for iframes // See setDocument() // Removing the function wrapper
causes a "Permission Denied" // error in IE unloadHandler = function() { setDocument(); },
disabledAncestor = addCombinator( function( elem ) { return elem.disabled === true &&
("form" in elem || "label" in elem); }, { dir: "parentNode", next: "legend" } ); // Optimize for
push.apply( _, NodeList ) try { push.apply( (arr = slice.call( preferredDoc.childNodes )),
preferredDoc.childNodes ); // Support: Android<4.0 // Detect silently failing push.apply arr[
preferredDoc.childNodes.length ].nodeType; } catch ( e ) { push = { apply: arr.length ? //
Leverage slice if possible function( target, els ) { push_native.apply( target, slice.call(els) ); } :
// Support: IE<9 // Otherwise append directly function( target, els ) { var j = target.length, i =
0; // Can't trust NodeList.length while ( (target[j++] = els[i++]) ) {} target.length = j - 1; } }; }
function Sizzle( selector, context, results, seed ) { var m, i, elem, nid, match, groups, newSelector,
newContext = context && context.ownerDocument, // nodeType defaults to 9, since context
defaults to document nodeType = context ? context.nodeType : 9; results = results || []; //
Return early from calls with invalid selector or context if ( typeof selector !== "string" || !selector
|| nodeType !== 1 && nodeType !== 9 && nodeType !== 11 ) { return results; } // Try to shortcut
find operations (as opposed to filters) in HTML documents if ( !seed ) { if ( ( context ?
context.ownerDocument || context : preferredDoc ) !== document ) { setDocument( context ); }
context = context || document; if ( documentIsHTML ) { // If the selector is sufficiently simple,
try using a "get*By*" DOM method // (excepting DocumentFragment context, where the
methods don't exist) if ( nodeType !== 11 && (match = rquickExpr.exec( selector )) ) { // ID
selector if ( (m = match[1]) ) { // Document context if ( nodeType === 9 ) { if ( (elem =
context.getElementById( m )) ) { // Support: IE, Opera, Webkit // TODO: identify versions
// getElementById can match elements by name instead of ID if ( elem.id === m ) {
results.push( elem ); return results; } } else { return results; } // Element
context } else { // Support: IE, Opera, Webkit // TODO: identify versions //
getElementById can match elements by name instead of ID if ( newContext && (elem =
newContext.getElementById( m )) && contains( context, elem ) && elem.id === m ) {
results.push( elem ); return results; } } // Type selector } else if ( match[2] ) {
push.apply( results, context.getElementsByTagName( selector ) ); return results; // Class
selector } else if ( (m = match[3]) && support.getElementsByClassName &&
context.getElementsByClassName ) { push.apply( results, context.getElementsByClassName(
m ) ); return results; } } // Take advantage of querySelectorAll if ( support.qsa &&!compilerCache[ selector + " " ] && (!rbuggyQSA || !rbuggyQSA.test( selector )) ) { if (
nodeType !== 1 ) { newContext = context; newSelector = selector; // qSA looks outside
Element context, which is not what we want // Thanks to Andrew Dupont for this workaround
technique // Support: IE <=8 // Exclude object elements } else if (
context.nodeName.toLowerCase() !== "object" ) { // Capture the context ID, setting it first if
necessary if ( (nid = context.getAttribute( "id" )) ) { nid = nid.replace( rcssescape,
fcssescape ); } else { context.setAttribute( "id", (nid = expando) ); } // Prefix every
selector in the list groups = tokenize( selector ); i = groups.length; while ( i-- ) {
groups[i] = "#" + nid + " " + toSelector( groups[i] ); } newSelector = groups.join( "," ); //
Expand context for sibling selectors newContext = rsibling.test( selector ) && testContext(
context.parentNode ) || context; } if ( newSelector ) { try { push.apply( results,
newContext.querySelectorAll( newSelector ) ); return results; } catch ( qsaError ) { }
finally { if ( nid === expando ) { context.removeAttribute( "id" ); } } } } } } // All
others return select( selector.replace( rtrim, "$1" ), context, results, seed ); } /** * Create keyvalue caches of limited size * @returns {function(string, object)} Returns the Object data after
storing it on itself with * property name the (space-suffixed) string and (if the cache is larger
than Expr.cacheLength) * deleting the oldest entry */ function createCache() { var keys = [];
function cache( key, value ) { // Use (key + " ") to avoid collision with native prototype properties
(see Issue #157) if ( keys.push( key + " " ) > Expr.cacheLength ) { // Only keep the most recent
entries delete cache[ keys.shift() ]; } return (cache[ key + " " ] = value); } return cache; } /** *
Mark a function for special use by Sizzle * @param {Function} fn The function to mark */ function
markFunction( fn ) { fn[ expando ] = true; return fn; } /** * Support testing using an element *
@param {Function} fn Passed the created element and returns a boolean result */ function
assert( fn ) { var el = document.createElement("fieldset"); try { return !!fn( el ); } catch (e) {
return false; } finally { // Remove from its parent by default if ( el.parentNode ) {
el.parentNode.removeChild( el ); } // release memory in IE el = null; } } /** * Adds the same
handler for all of the specified attrs * @param {String} attrs Pipe-separated list of attributes *
@param {Function} handler The method that will be applied */ function addHandle( attrs, handler
) { var arr = attrs.split("|"), i = arr.length; while ( i-- ) { Expr.attrHandle[ arr[i] ] = handler; } } /** *
Checks document order of two siblings * @param {Element} a * @param {Element} b * @returns
{Number} Returns less than 0 if a precedes b, greater than 0 if a follows b */ function
siblingCheck( a, b ) { var cur = b && a, diff = cur && a.nodeType === 1 && b.nodeType === 1 &&
a.sourceIndex - b.sourceIndex; // Use IE sourceIndex if available on both nodes if ( diff ) {
return diff; } // Check if b follows a if ( cur ) { while ( (cur = cur.nextSibling) ) { if ( cur === b ) {
return -1; } } } return a ? 1 : -1; } /** * Returns a function to use in pseudos for input types *
@param {String} type */ function createInputPseudo( type ) { return function( elem ) { var name
= elem.nodeName.toLowerCase(); return name === "input" && elem.type === type; }; } /** *
Returns a function to use in pseudos for buttons * @param {String} type */ function
createButtonPseudo( type ) { return function( elem ) { var name =
elem.nodeName.toLowerCase(); return (name === "input" || name === "button") && elem.type
=== type; }; } /** * Returns a function to use in pseudos for :enabled/:disabled * @param
{Boolean} disabled true for :disabled; false for :enabled */ function createDisabledPseudo(
disabled ) { // Known :disabled false positives: fieldset[disabled] > legend:nth-of-type(n+2) :candisable return function( elem ) { // Only certain elements can match :enabled or :disabled //
https://html.spec.whatwg.org/multipage/scripting.html#selector-enabled // https://
html.spec.whatwg.org/multipage/scripting.html#selector-disabled if ( "form" in elem ) { //
Check for inherited disabledness on relevant non-disabled elements: // * listed formassociated elements in a disabled fieldset // https://html.spec.whatwg.org/multipage/
forms.html#category-listed // https://html.spec.whatwg.org/multipage/forms.html#conceptfe-disabled // * option elements in a disabled optgroup // https://html.spec.whatwg.org/
multipage/forms.html#concept-option-disabled // All such elements have a "form" property.
if ( elem.parentNode && elem.disabled === false ) { // Option elements defer to a parent
optgroup if present if ( "label" in elem ) { if ( "label" in elem.parentNode ) { returnelem.parentNode.disabled === disabled; } else { return elem.disabled === disabled; } }
// Support: IE 6 - 11 // Use the isDisabled shortcut property to check for disabled fieldset
ancestors return elem.isDisabled === disabled || // Where there is no isDisabled, check
manually /* jshint -W018 */ elem.isDisabled !== !disabled && disabledAncestor( elem )
=== disabled; } return elem.disabled === disabled; // Try to winnow out elements that can't
be disabled before trusting the disabled property. // Some victims get caught in our net (label,
legend, menu, track), but it shouldn't // even exist on them, let alone have a boolean value. } else
if ( "label" in elem ) { return elem.disabled === disabled; } // Remaining elements are neither
:enabled nor :disabled return false; }; } /** * Returns a function to use in pseudos for positionals
* @param {Function} fn */ function createPositionalPseudo( fn ) { return markFunction(function(
argument ) { argument = +argument; return markFunction(function( seed, matches ) { var j,
matchIndexes = fn( [], seed.length, argument ), i = matchIndexes.length; // Match elements
found at the specified indexes while ( i-- ) { if ( seed[ (j = matchIndexes[i]) ] ) { seed[j] =
!(matches[j] = seed[j]); } } }); }); } /** * Checks a node for validity as a Sizzle context *
@param {Element|Object=} context * @returns {Element|Object|Boolean} The input node if
acceptable, otherwise a falsy value */ function testContext( context ) { return context && typeof
context.getElementsByTagName !== "undefined" && context; } // Expose support vars for
convenience support = Sizzle.support = {}; /** * Detects XML nodes * @param {Element|Object}
elem An element or a document * @returns {Boolean} True iff elem is a non-HTML XML node */
isXML = Sizzle.isXML = function( elem ) { // documentElement is verified for cases where it
doesn't yet exist // (such as loading iframes in IE - #4833) var documentElement = elem &&
(elem.ownerDocument || elem).documentElement; return documentElement ?
documentElement.nodeName !== "HTML" : false; }; /** * Sets document-related variables once
based on the current document * @param {Element|Object} [doc] An element or document
object to use to set the document * @returns {Object} Returns the current document */
setDocument = Sizzle.setDocument = function( node ) { var hasCompare, subWindow, doc =
node ? node.ownerDocument || node : preferredDoc; // Return early if doc is invalid or already
selected if ( doc === document || doc.nodeType !== 9 || !doc.documentElement ) { return
document; } // Update global variables document = doc; docElem =
document.documentElement; documentIsHTML = !isXML( document ); // Support: IE 9-11,
Edge // Accessing iframe documents after unload throws "permission denied" errors (jQuery
#13936) if ( preferredDoc !== document && (subWindow = document.defaultView) &&
subWindow.top !== subWindow ) { // Support: IE 11, Edge if ( subWindow.addEventListener ) {
subWindow.addEventListener( "unload", unloadHandler, false ); // Support: IE 9 - 10 only } else
if ( subWindow.attachEvent ) { subWindow.attachEvent( "onunload", unloadHandler ); } } /*
Attributes ---------------------------------------------------------------------- */ // Support: IE<8 // Verify that
getAttribute really returns attribu
Last modified: 21:37