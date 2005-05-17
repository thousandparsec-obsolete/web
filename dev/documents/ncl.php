<?php $title = "Thousand Parsec Component Language" ?>
<?php include "../bits/start_page.inc" ?>

<style type="text/css">
<!--
.fixme { color: #ff0000; }
.v2 { color: #00ff00; }
.v3 { color: #ffff00; }
-->
</style>

<?php include "../bits/start_section.inc" ?>

<h1>Thousand Parsec Component Language</h1>
<p> Last updated: 16 May 2005</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>Introduction</h2>

<p>
	The Thousand Parsec Component Language (TPCL) is designed for the usage
	by Thousand Parsec clients in the interactive designing of things.  
</p><p>
	The language is based on a subset of the Scheme language with a few
	minor changes. This language is close enough to the Scheme R5RS
	definition that any scheme interpreter which is compatible with this
	definition should be able to be used with little modification. 
</p><p>
	Scheme was choose for these reasons, 
	<ul>
		<li>Scheme is extremely simple.</li>
		<li>Scheme has already be used as an embedded language.</li>
		<li>Scheme has a large number of resources for learning and coding
		scheme.</li>
		<li>Scheme has interpreters written in C, C++, Python and Java (and
		many other languages).</li>
		<li>Scheme has plenty of academic documentation on implementing your own
		scheme interpreter and it turns out to be a pretty trivial task.</li>
	</ul>
</p>

<h2>Aim</h2>
<p>
	The aim is to allow all designs to be made client side without any
	interaction with the server. This should allow instant feedback about
	the properties, makeup and validity of the design. This should make
	the designing experience much more pleasant for the user. 
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>Key</h2>
<ul>
	<li class="v2">Version 2 changes are marked in green.</li>
	<li class="v3">Version 3 changes are marked in blue.</li>
	<li class="nclcode">NCL code is marked like this.</li>
</ul>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>????</h2>

<p>
	TPCL is based on the Scheme <a href="put link here">R5RS standard</a>.
</p><p>
	The following section will highlight the differences between the R5RS
	standard. Both differences and compatibilities are listed for each
	section of the R5RS. Any section which is not mentioned should be
	assumed to be not relevant (to compatibility/difference).  
</p>

<h3>1 Overview of Scheme</h3>
<p>
	This section is not relevant as it is only a summary of other sections.
</p>

<h3>2 Lexical conventions</h3>
<p>
	TPCL is completely compatible with this section.
</p>

<h3>3 Basic concepts</h3>
<h4>3.1 Variables, Syntactic Keywords and Regions</h4>
<p>
	TPCL is compatible with this section. However some of the functions
	referenced in this section are not available. See Section 4 for more
	details.
</p>

<h4>3.2 Disjointness of Types</h4>
<p>
	TPCL is compatible with this section. However neither vector or port
	types (and associated functions) are available.
</p>

<h4>3.3 External Representations</h4>
<p>
	TPCL is compatible with this section. However that because there is no
	input or output neither "read" and "write" are implemented.
</p>

<h4>3.4 Storage Model</h4>
<p class="fixme">
	Full.
</p>

<h4>3.5 Proper Tail Recursion</h4>
<p>
	TPCL does not require a full tail recursion implementation, however it
	is highly recommended.
</p>

<h3>4 Expressions</h3>
<h4>4.1 Primitive expression types</h4>
<p>
	TPCL is completely compatible with this section
</p>

<h4>4.2 Derived expression types</h4>
<h5>4.2.1 Conditionals</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5>4.2.2 Bindings constructs</h5>
<p>
	TPCL only has let and let*, letrec is not available.
</p>

<h5>4.2.3 Sequencing</h5>
<p>
	TPCL does not have separate <span class="tpcl">begin</a> statement. All
	functions which have implicit begins still retain the normal behavior.
	This is because there are no cases in TPCL where a begin by itself
	makes sense.
</p>

<h5>4.2.4 Iteration</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5>4.2.5 Delayed Evaluation</h5>
<p>
	TPCL does not support any form of delayed evaluation.
</p>

<h5>4.2.6 Quasiquotation</h5>
<p>
	<span class="fixme">Should we support Quasiquotation?</span>
</p>

<h4>4.3 Macros</h4>
<p>
	TPCL does not support any form of macros.
</p>

<h3>5 Expressions</h3>
<h4>5.1 Programs</h4>
<p>
	TPCL is typically never stored in files or entered interactively. TPCL
	has no "top-level" as normally found in Scheme program.
</p>

<h4>5.2 Definitions</h4>
<p>
	TPCL is completely compatible with this section.
</p>

<h4>5.3 Syntax Definitions</h4>
<p>
	TPCL does not support any form of syntax definitions.
</p>

<h3>6 Standard procedures</h3>
<h4>6.1 Equivalence Predicates</h4>
<p>
	TPCL includes all Scheme equivalence predicates described in this
	section.
</p>

<h5>6.2.1 Numerical Types</h5>
<p>
	TPCL only has a single numerical type which is equivalent to Schemes
	<span class="tpcl">real</span>.
</p>

<h5>6.2.2 Exactness</h5>
<p>
	As TPCL has only Reals exactness make no sense. No exactness functions
	are available.
</p>

<h5>6.2.3 Implementation Restrictions</h5>
<p>
	TPCL requires that IEEE 64-bit floating point standards be followed for
	Reals.
</p>

<h5>6.2.4 Syntax of Numerical Constants</h5>
<p>
	TPCL includes all the syntax of types which are listed (except complex)
	but all result in the production of a real.
</p>

<h5> 6.2.5 Numerical operations</h5>
<p>
	TPCL does not have some operations described in this section.  TPCL
	does not have optional operations, an available operations must be
	implemented.
</p><p>
	Note that some of the definitions are slightly different because of
	the fact that only Reals exist in TPCL.
</p><p>
	Available:
	<ul>
		<li>(number? obj)</li>
		<li>(real? obj)</li>
		<li>(= r1 r2 ...)</li>
		<li>(&lt; r1 r2 ...)</li>
		<li>(&gt; r1 r2 ...)</li>
		<li>(&lt;= r1 r2 ...)</li>
		<li>(&gt;= r1 r2 ...)</li>
		<li>(zero? r)</li>
		<li>(positive? r)</li>
		<li>(negative? r)</li>
		<li>(odd? r)</li>
		<li>(even? r)</li>
		<li>(max r1 r2 ...)</li>
		<li>(min r1 r2 ...)</li>
		<li>(+ r1 ...)</li>
		<li>(* r1 ...)</li>
		<li>(- r1 r2)</li>
		<li>(- r)</li>
		<li>(- r1 r2 ...)</li>
		<li>(/ r1 r2)</li> 
		<li>(/ r)</li>
		<li>(/ r1 r2 ...)</li>
		<li>(abs r1)</li>
		<li>(quotient r1 r2)</li>
		<li>(remainder r1 r2)</li>
		<li>(modulo n1 n2)</li>
		<li>(gcd r1 ...)</li>
		<li>(lcd r1 ...)</li>
		<li>(floor r)</li>
		<li>(ceiling r)</li>
		<li>(truncate x)</li>
		<li>(round x)</li>
		<li>(exp r)</li>
		<li>(log r)</li>
		<li>(sin r)</li>
		<li>(cos r)</li>
		<li>(tan r)</li>
		<li>(asin r)</li>
		<li>(acos r)</li>
		<li>(atan r)</li>
		<li>(atan r1 r2)</li>
		<li>(sqrt z)</li>
		<li>(expt z1 z2)</li>
	</ul>
	Not Available:
	<ul>
		<li>(complex? obj)</li>
    	<li>(rational? obj)</li>
		<li>(integer? obj)</li>
		<li>(exact? obj)</li>
		<li>(inexact? obj)</li>
		<li>(rationalize x y)</li>
		<li>(make-rectangular x1 x2)</li>
		<li>(make-polar x3 x4)</li>
		<li>(real-part z)</li>
		<li>(imag-part z)</li>
		<li>(magnitude z)</li>
		<li>(angle z)</li>
		<li>(exact-&gt;inexact z)</li>
		<li>(inexact-&gt;exact z)</li>
	</ul>
</p>

<H3> 6.2.6 Numerical Input and Output</H3>
    Not implemented.

<h5> 6.3.1 Booleans</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5> 6.3.2 Pairs and Lists</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5> 6.3.3 Symbols</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5> 6.3.4 Characters</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5> 6.3.5 Strings</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h5> 6.3.6 Vectors</h5>
<p>
	TPCL is completely compatible with this section.
</p>

<h4> 6.4 Control Features</h4>
<p>
	TPCL is compatible with this section however it the following
	procedures are not available,
	
	<ul>
		<li>for-each</li>
		<li>force (no delay)</li>
		<li class="fixme">call-with-current-continuation</li>
		<li class="fixme">values</li>
		<li class="fixme">call-with-values</li>
		<li>dynamic-wind</li>
	</ul>
</p>

<h4> 6.5 Eval</h4>
<p>
	TPCL does not include an eval function.
</p>

<h4>6.6 Input and output</h4>
<p>
	TPCL does not include any input or output support. No function found in
	this section is available.
</p>


<h3>Additional Functions</h3>
<p>
	TPCL also includes the following extra functions as standard.

	<ul>
		<li>rad-&gt;deg : (num -&gt; num)
			<p>Converts radians into degrees</p></li>
    	<li>deg-&gt;rad : (num -&gt; num)
			<p>Converts degrees into radians</p></li>

    	<li>logt : (num num -&gt; num)
			<p>Inverse of the expt function</p></li>
<TT> <span class="v3"> pi : real</span> </TT>

    <BLOCKQUOTE>

	<span class="v3">
pi to exactly 12 decimal places</span>
 <BR>

    </BLOCKQUOTE>


    <LI>
<TT> <span class="v3"> e : real</span> </TT>

    <BLOCKQUOTE>

	<span class="v3">
e to exactly 12 decimal places</span>

    </BLOCKQUOTE>

<BR>

<UL>

    <LI>
<TT> <span class="v3"> append : ((listof any) ... -&gt; (listof
any))</span> </TT>

    <LI>
<TT> <span class="v3"> assq : (x (listof (cons x y)) -&gt; (union false
(cons x y)))</span> </TT>

    <LI>
<TT> <span class="v3"> caaar : ((cons (cons (cons w (listof z)) (listof
y)) (listof x)) -&gt; w)</span> </TT>

    <LI>
<TT> <span class="v3"> caadr : ((cons (cons (cons w (listof z)) (listof
y)) (listof x)) -&gt; (listof z))</span> </TT>

    <LI>
<TT> <span class="v3"> caar : ((cons (cons z (listof y)) (listof x))
-&gt; z)</span> </TT>

    <LI>
<TT> <span class="v3"> cadar : ((cons (cons w (cons z (listof y)))
(listof x)) -&gt; z)</span> </TT>

    <LI>
<TT> <span class="v3"> cadddr : ((listof y) -&gt; y)</span> </TT>

    <LI>
<TT> <span class="v3"> caddr : ((cons w (cons z (cons y (listof x))))
-&gt; y)</span> </TT>

    <LI>
<TT> <span class="v3"> cadr : ((cons z (cons y (listof x))) -&gt;
y)</span> </TT>

    <LI>
<TT> <span class="v3"> car : ((cons y (listof x)) -&gt; y)</span> </TT>

    <LI>
<TT> <span class="v3"> cdaar : ((cons (cons (cons w (listof z)) (listof
y)) (listof x)) -&gt; (listof z))</span> </TT>

    <LI>
<TT> <span class="v3"> cdadr : ((cons w (cons (cons z (listof y))
(listof x))) -&gt; (listof y))</span> </TT>

    <LI>
<TT> <span class="v3"> cdar : ((cons (cons z (listof y)) (listof x)) -&gt;
(listof y))</span> </TT>

    <LI>
<TT> <span class="v3"> cddar : ((cons (cons w (cons z (listof y)))
(listof x)) -&gt; (listof y))</span> </TT>

    <LI>
<TT> <span class="v3"> cdddr : ((cons w (cons z (cons y (listof x))))
-&gt; (listof x))</span> </TT>

    <LI>
<TT> <span class="v3"> cddr : ((cons z (cons y (listof x))) -&gt;
(listof x))</span> </TT>

    <LI>
<TT> <span class="v3"> cdr : ((cons y (listof x)) -&gt; (listof x))</span>
</TT>

    <LI>
<TT> <span class="v3"> cons : (x (listof x) -&gt; (listof x))</span> </TT>

    <LI>
<TT> <span class="v3"> cons? : (any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> eighth : ((listof y) -&gt; y)</span> </TT>

    <LI>
<TT> <span class="v3"> empty? : (any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> first : ((cons y (listof x)) -&gt; y)</span> </TT>

    <LI>
<TT> <span class="v3"> length : (list -&gt; number)</span> </TT>

    <LI>
<TT> <span class="v3"> list : (any ... (listof any) -&gt; (listof
any))</span> </TT>

    <LI>
<TT> <span class="v3"> list : (any ... -&gt; (listof any))</span> </TT>

    <LI>
<TT> <span class="v3"> list* : (any ... (listof any) -&gt; (listof
any))</span> </TT>

    <LI>
<TT> <span class="v3"> list-ref : ((listof x) natural-number -&gt;
x)</span> </TT>

    <LI>
<TT> <span class="v3"> list? : (any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> member : (any list -&gt; (union false list))</span>
</TT>

    <LI>
<TT> <span class="v3"> memq : (any list -&gt; (union false list))</span>
</TT>

    <LI>
<TT> <span class="v3"> memv : (any list -&gt; (union false list))</span>
</TT>

    <LI>
<TT> <span class="v3"> null : empty</span> </TT>

    <LI>
<TT> <span class="v3"> null? : (any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> pair? : (any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> rest : ((cons y (listof x)) -&gt; (listof
x))</span> </TT>

    <LI>
<TT> <span class="v3"> reverse : (list -&gt; list)</span> </TT>

</UL>

<LI> <I> <TT> <span class="v3"> Strings</span> </TT> </I>

<UL>

    <LI>
<TT> <span class="v3"> format : (string any ... -&gt; string)</span> </TT>

    <LI>
<TT> <span class="v3"> list-&gt;string : ((listof char) -&gt;
string)</span> </TT>

    <LI>
<TT> <span class="v3"> make-string : (nat char -&gt; string)</span> </TT>

    <LI>
<TT> <span class="v3"> string-append : (string ... -&gt; string)</span>
</TT>

    <LI>
<TT> <span class="v3"> string-copy : (string -&gt; string)</span> </TT>

    <LI>
<TT> <span class="v3"> string-length : (string -&gt; nat)</span> </TT>

    <LI>
<TT> <span class="v3"> string-ref : (string nat -&gt; char)</span> </TT>

    <LI>
<TT> <span class="v3"> string? : (any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> substring : (string nat nat -&gt; string)</span>
</TT>

</UL>

<LI> <I> <TT> <span class="v3"> Misc</span> </TT> </I>

<UL>

    <LI>
<TT> <span class="v3"> =~ : (real real non-negative-real -&gt;
boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> eq? : (any any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> equal? : (any any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> equal~? : (any any non-negative-real -&gt;
boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> eqv? : (any any -&gt; boolean)</span> </TT>

    <LI>
<TT> <span class="v3"> error : (symbol string -&gt; void)</span> </TT>

    <LI>
<TT> <span class="v3"> identity : (any -&gt; any)</span> </TT>

    <LI>
<TT> <span class="v3"> struct? : (any -&gt; boolean)</span> </TT>

</UL>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<BR>

<BR>

<BR>

<BR>



<p>
</p><p>
This language will be referred to as the &quot;New Component
Language&quot; (or NCL for short). Where there is not enough information
in this specification please refer to the R5RS Scheme standard for more
information.&nbsp; All NCL functions are deterministic, this means that
given the same input they will produce the same output.<BR>

<BR>

There are 4 parts to the Component/Design stuff, <UL>

    <LI>
Components,
    <BLOCKQUOTE>

	The base building blocks for building designs
    </BLOCKQUOTE>

    <LI>
Properties,
    <BLOCKQUOTE>

	Numerical values which describe aspects of designs and components
    </BLOCKQUOTE>

    <LI>
Categories,
    <BLOCKQUOTE>

	An organization unit for grouping components/designs/properties
    </BLOCKQUOTE>

    <LI>
Designs,
    <BLOCKQUOTE>

	A combination of Components into a useful object
    </BLOCKQUOTE>

</UL>

<H1>

<B> <FONT SIZE="6"> Components</FONT> </B>

</H1>

<BR>

Each Component has the following structure, <UL>

    <LI>
a UInt32, the ID of the Component
    <LI>
a list of UInt32, IDs of Categories the Component is in
    <LI>
a String, NCL Add function
    <BLOCKQUOTE>

	A NCL function which is called when adding this component to
	a design. If the component is allowed to be added to <FONT
	COLOR="#0000ff">
a design then the function should return a pair with True and a string to
be displayed, otherwise it should return a pair with false and a string
which describes the reason for not being able to add the component. The
function is given the design object which it is being added to. </FONT>
<BR>

	<BR>

	The most basic case which always allows this component to be
	added,<BR>

	<BLOCKQUOTE>

	    <FONT COLOR="#0000ff">
(lambda (design) </FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp; (cons #t &quot;&quot;))</FONT> <BR>

	</BLOCKQUOTE>

	An more advanced case would be the &quot;Personal Pod&quot;
	which cannot be added to any Design where the radiation level
	is above one.<BR>

	<BLOCKQUOTE>

	    <FONT COLOR="#0000ff">
(lambda (design)</FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp; (if (&gt; design.radiation 1)</FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #t &quot;&quot;)</FONT>
<BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #f &quot;Radiation
Level is too high for Personal Pod to be added&quot;)</FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp; )</FONT> <BR>

	    <FONT COLOR="#0000ff">
)</FONT> <BR>

	</BLOCKQUOTE>

	<FONT COLOR="#0000ff">
Another example would be the &quot;Sheep Skin&quot; component which only
provides shields on unarmed ships.</FONT> <BR>

	<BLOCKQUOTE>

	    <FONT COLOR="#0000ff">
(lambda (design)</FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp; (if (&gt; design.firepower 1)</FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #t &quot;Sheep Skin
cannot provide shields as the ship is armed&quot;)</FONT> <BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #t &quot;&quot;)</FONT>
<BR>

	    <FONT COLOR="#0000ff">
&nbsp;&nbsp;&nbsp; )</FONT> <BR>

	    <FONT COLOR="#0000ff">
)</FONT>

	</BLOCKQUOTE>

    </BLOCKQUOTE>

    <LI>
a list of
    <BLOCKQUOTE>

	a UInt32, ID of the property this is a String, NCL Property
	function <BR>

	<BLOCKQUOTE>

	    A NCL function which is called to work out the amount this
	    component contributes to a property. It should return a
	    valid number. It is given the current design.<BR>

	    <BR>

	    The most basic case where the component has a constant value
	    for this property,<BR>

	    <BLOCKQUOTE>

		(lambda (design)<BR>

		&nbsp;&nbsp;&nbsp; 1) <BR>

	    </BLOCKQUOTE>

	    A more advanced example would be the &quot;Sheep Skin&quot;
	    component will only have a cloaking effect if the design
	    has no firepower.<BR>

	    <BLOCKQUOTE>

		(lambda (design)<BR>

		&nbsp;&nbsp;&nbsp; (if (&gt; design.firepower 0)
		0 100))<BR>

	    </BLOCKQUOTE>

	</BLOCKQUOTE>

    </BLOCKQUOTE>

</UL>

<BLOCKQUOTE>

    <BLOCKQUOTE>

	<BLOCKQUOTE>

	    <B>
This function can not depend on any property which has an order which
is less then or equal to this property. </B> <BR>

	    For example if the &quot;firepower&quot; property was
	    order 1 and the &quot;cloaking&quot; property was order 0,
	    then the cloaking property can not depend on the firepower
	    property. This would mean the &quot;Sheep Skin&quot; would
	    be an invalid component. This is needed to stop circular
	    dependency such as,<BR>

	    <BLOCKQUOTE>

		&quot;Blaster&quot;, only provides firepower if the ship
		has no shields<BR>

		&quot;Sheep Skin&quot;, only provides shields if the
		ship has no firepower
	    </BLOCKQUOTE>

	</BLOCKQUOTE>

    </BLOCKQUOTE>

</BLOCKQUOTE>

<H1>

<B> <FONT SIZE="6"> Properties</FONT> </B>

</H1>

Each Property has, <UL>

    <LI>
a UInt32, ID of the Property
    <LI>
a UInt32, order of the property (IE the order the properties are
calculated in)
    <LI>
a String, the name of the Property
    <LI>
a String, a description of the Property
    <LI>
a String, NCL Display function,
    <BLOCKQUOTE>

	A NCL function which is called to work out how to display the
	property. It should return a pair which contains the actual
	value and a string which will be displayed (The string could be
	anything from &quot;3.39 psi&quot; to &quot;35 Sheep of Possible
	100 Sheep&quot;). <span class="v2">
It is called with the current design and a list containing the value
each component contributes to the property. </span> <BR>

	<BR>

	<span class="v2">
It is important that the function is not dependent on the list being in
any order. If order is required the function must first sort it. (For
example calling with [10, 4, 5] should return the same result as calling
with [5, 4, 10] or [4, 5, 10].)</span> <BR>

	<BR>

	<B>
<span class="v2"> This function can not depend on any property which has
an order which is less then or equal to this property. </span> </B> <BR>

	<BR>

	A simple linear example which displays &quot;10 PSI&quot;,<BR>

	<BLOCKQUOTE>

	    (lambda (design, bits)<BR>

	    &nbsp;&nbsp;&nbsp; (let ((n (apply + bits)))<BR>

	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons n
	    (string-append n &quot; PSI&quot;))<BR>

	    &nbsp;&nbsp;&nbsp; )<BR>

	    )<BR>

	</BLOCKQUOTE>

	A more advanced linear example which displays different units
	depending on the value of the input<BR>

	<BLOCKQUOTE>

	    (lambda (design, bits)<BR>

	    &nbsp;&nbsp;&nbsp; (let ((n (apply + bits)))<BR>

	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cond <BR>

	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    ((&lt; n 100) (cons n (string-append n &quot; grams&quot;))
	    )<BR>

	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    ((&lt; n 1000) (cons (/ n 100) (string-append n &quot;
	    kilograms&quot;)) )<BR>

	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    ((&lt; n 10000) (cons (/ n 1000) (string-append n &quot;
	    tons&quot;)) )<BR>

	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )<BR>

	    &nbsp;&nbsp;&nbsp; )<BR>

	    )<BR>

	</BLOCKQUOTE>

	<span class="v2">
A compound example which depends only on other properties, calculates
acceleration,</span> <BR>

	<BLOCKQUOTE>

	    <span class="v2">
(lambda (design, bits)</span> <BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp; (let ((n (/ design.force design.mass)))</span> <BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons n (string-append n &quot;
m/s^2&quot;))</span> <BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp; )</span> <BR>

	    <span class="v2">
)</span> <BR>

	</BLOCKQUOTE>

	<span class="v2">
A compound example which depends on both other properties and the bits,
calculates the cloaking,</span> <BR>

	<BLOCKQUOTE>

	    <span class="v2">
(lambda (design, bits)</span> <BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp; (let ((n (/ (apply + bits) design.mass)))</span> <BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (set! n (/ n (n+1)))</span>
<BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons n (string-append n &quot;
%&quot;))</span> <BR>

	    <span class="v2">
&nbsp;&nbsp;&nbsp; )</span> <BR>

	    <span class="v2">
)</span> <BR>

	</BLOCKQUOTE>

	<BR>

    </BLOCKQUOTE>

</UL>

<H1>

<B> <FONT SIZE="6"> Designs</FONT> </B>

</H1>

<BR>

Each Design has, <UL>

    <LI>
a UInt32, the ID of the Design
    <LI>
a list of UInt32, IDs of Categories the Design is in
    <LI>
<span class="v2"> a SInt32</span> , the number of times the Design is
in use
    <LI>
<span class="v2"> a SInt32, the owner of the Design</span>

    <LI>
a list of UInt32, IDs of the Components which are in a Design </UL>

<B> <span class="v2"> Notes:</span> </B> <BR>

<span class="v2"> If the design is unusable then the number of times in
use will be -1.</span> <BR>

<span class="v2"> If the owner is unknown the field will be -1, if the
player owns the design then it will be zero, otherwise it will be the
ID of the player who owns the design.</span> <BR>

<BR>

<BR>

<BR>

<BR>

<H1>

<B> <FONT SIZE="6"> Categories</FONT> </B>

</H1>

Each Category has, <UL>

    <LI>
a UInt32, ID of the Category
    <LI>
a String, the name of the Category
    <LI>
a UInt32, the type of the Category (Component, Design, Property)
    <LI>
a list of UInt32, IDs of the things in the Category </UL>

<H1>

<B> <FONT SIZE="6"> <span class="v2"> How to Calculate?</FONT> </span>
</B>

</H1>

<span class="v2"> At first figuring out how to calculate all this seems
hard, but it turns out to be quite easy. </span> <BR>

<BR>

<span class="v2"> Firstly we need to understand the difference
between the base Property and the PropertyValue on each component. A
PropertyValue evaluates to the value of the property for a specific
to a component. A Property takes a list of values that evaluating
PropertyValues has produced and calculates the value of the property for
the whole design. With this in mind it is easy to see how to calculate
the design.</span>

<H4>

<B> <span class="v2"> Step 1.</span> </B>

</H4>

<span class="v2"> Loop over all the components in a design and collect
their properties into a list ordered on their order.</span> <BR>

<BR>

<span class="v2"> The following code in pseudo-python should serve as
an example,</span>

<PRE>

<span class="v2"> properties = {}</span>

<span class="v2"> for component in components:</span>

<span class="v2"> &nbsp;&nbsp;&nbsp; for propertyvalue in
component.properties:</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; order =
propertyvalue.property.order</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if not
properties.has_key(order):</span>

<span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
properties[order] = []</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if
propertyvalue.property not in properties[order]:</span>

<span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
properties[order].append(propertyvalue.property)</span>

</PRE>

<span class="v2"> With the following input,</span>

<PRE>

<span class="v2"> components = [</span>

<span class="v2"> &nbsp; &lt;Large Solar Sail [</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
PropertyValue(EnergyPerYear)]&gt;</span>

<span class="v2"> &nbsp; &lt;Large Jump Engine [</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
PropertyValue(RequiredEnergy),</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
PropertyValue(RechargeTime)]&gt;</span>

<span class="v2"> ] </span>


<span class="v2"> # Where EnergyPerYear and RequiredEnergy are both
order 1 and RechargeTime is order 2</span>

</PRE>

<span class="v2"> You get the following output</span>

<PRE>

<span class="v2"> { 1: [Property(EnergyPerYear),
Property(RequiredEnergy)],</span>

<span class="v2"> &nbsp; 2: [Property(RechargeTime)]}</span>

</PRE>

<H4>

<B> <span class="v2"> Step 2:</span> </B>

</H4>

<span class="v2"> Create an empty &quot;design&quot; storage object</span>

<H4>

<B> <span class="v2"> Step 3:</span> </B>

</H4>

<span class="v2"> Loop over the newly created collection, for each
property, evaluate the property value for each component and then evaluate
the property with the property values.</span> <BR>

<BR>

<span class="v2"> Something like the below pseudo-python code should
serve as an example,</span>

<PRE>

<span class="v2"> keys = properties.keys()</span>

<span class="v2"> keys.sort()</span>


<span class="v2"> for key in keys:</span>

<span class="v2"> &nbsp;&nbsp;&nbsp; for property in
properties[key]:</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; bits =
[]</span>


<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # This
evaluates the property value for each component</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for component
in components:</span>

<span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
if component.has_property(property):</span>

<span class="v2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
bits.append(component.get_property(property.name).eval(design))</span>


<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # This
evaluates the overall value of the property</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; value,
text = property.eval(design, bits)</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
setattr(design, property.name, value)</span>


<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # Do
something with the property text here...</span>

<span class="v2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
do_something(text)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>

</PRE>

<BR>


<H1>

<span class="v3"> New Component Language</span> <BR>

</H1>

<BR>

<BR>
<BR>

<BR>


<span class="v3"> The NCL has the followings types,</span>

<UL>

    <LI>
<span class="v3"> Reals, Implemented be implemented so that precision
is that of a standard double</span>

    <LI>
<span class="v3"> Booleans, </span>

    <LI>
<span class="v3"> Chars and Strings, All Strings are in UTF-8</span>

    <LI>
<span class="v3"> Pairs and Lists, </span>

    <LI>
<span class="v3"> Design Structure, </span>

</UL>

<span class="v3"> NCL does not support the following normal scheme
types,</span>

<UL>

    <LI>
<span class="v3"> Rationals, Rational numbers are not supported, use
Reals instead </span>

    <LI>
<span class="v3"> Complex, Complex numbers are not supported, use a Pair
of Reals instead</span>

    <LI>
<span class="v3"> Vectors, Vectors are not supported, use Lists
instead</span>

    <LI>
<span class="v3"> Integers, Integers are not supported, use Reals
instead</span>

    <LI>
<span class="v3"> Object/Classes, there should be no use for these as
NCL is only for small functions with no persistent state</span>

</UL>

<BR>

<span class="v3"> NCL also does not include the following normal scheme
features,</span>

<UL>

    <LI>
<span class="v3"> Ability to define new structures</span>

    <LI>
<span class="v3"> Any input or output (include all functions related to
input and output)</span>

    <LI>
<span class="v3"> Macros</span>

</UL>

<BR>

<span class="v3"> NCL does not include the following standard scheme
functions,</span>
 <BR>

<BR>

<BR>

<BR>

<BR>

<H3>


<TT> <span class="v3"> ......... still more to come........... </span>
</TT> <BR>

<BR>

<TT> <span class="v3"> Have to define the language more
specifically.</span> </TT> <BR>

<BR>


<?php
	include "../bits/end_section.inc"; include "../bits/end_page.inc";
?>

