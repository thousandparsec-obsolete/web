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
<p> Last updated: 15 July 2005</p>

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
	<li class="nclcode">TPCL code is marked like this.</li>
</ul>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>Quick Overview</h2>

<p>
	TPCL has the followings types,

<ul>
	<li>Reals, Implemented be implemented so that precision is that of a standard double
	<li>Booleans, 
	<li>Chars and Strings, All Strings are in UTF-8
	<li>Pairs and Lists
	<li>Design Structure
</ul>

	TPCL does not support the following normal schemetypes,</span>

<ul>
	<li>Rationals, Rational numbers are not supported, use Reals instead
	<li>Complex, Complex numbers are not supported, use a Pair of Reals instead
	<li>Vectors, Vectors are not supported, use Lists instead
	<li>Integers, Integers are not supported, use Reals instead
	<li>Object/Classes, there should be no use for these as TPCL is only for small functions with no persistent state
</ul>

</p><p>
	TPCL also does not include the following normal scheme
	features,

	<ul>
		<li>Ability to define new structures
		<li>Any input or output (include all functions related to input and output)
		<li>Macros
	</ul>
</p>


<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>Details</h2>

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

<h5> 6.2.6 Numerical Input and Output</h5>
<p>
	Not implemented.
</p>

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

		<span class="fixme">
		<li>pi : real
			<p>pi to exactly 12 decimal places</p></li>
			
		<li>e : real
			<p>e to exactly 12 decimal places</p></li>
	</ul>
	<ul class="fixme">
		<li>append : ((listof any) ... -&gt; (listofany))</li>
		<li>assq : (x (listof (cons x y)) -&gt; (union false (cons x y)))</li>
		<li>caaar : ((cons (cons (cons w (listof z)) (listof y)) (listof x)) -&gt; w)</li>
		<li>caadr : ((cons (cons (cons w (listof z)) (listof y)) (listof x)) -&gt; (listof z))</li> 
		<li>caar : ((cons (cons z (listof y)) (listof x)) -&gt; z)</li> 
		<li>cadar : ((cons (cons w (cons z (listof y))) (listof x)) -&gt; z)</li>
		<li>cadddr : ((listof y) -&gt; y)</li>
		<li>caddr : ((cons w (cons z (cons y (listof x)))) -&gt; y)</li> 
		<li>cadr : ((cons z (cons y (listof x))) -&gt; y)</li> 
		<li>car : ((cons y (listof x)) -&gt; y)</li>
		<li>cdaar : ((cons (cons (cons w (listof z)) (listof y)) (listof x)) -&gt; (listof z))</li> 
		<li>cdadr : ((cons w (cons (cons z (listof y)) (listof x))) -&gt; (listof y))</li> 
		<li>cdar : ((cons (cons z (listof y)) (listof x)) -&gt; (listof y))</li> 
		<li>cddar : ((cons (cons w (cons z (listof y))) (listof x)) -&gt; (listof y))</li> 
		<li>cdddr : ((cons w (cons z (cons y (listof x)))) -&gt; (listof x))</li> 
		<li>cddr : ((cons z (cons y (listof x))) -&gt; (listof x))</li> 
		<li>cdr : ((cons y (listof x)) -&gt; (listof x))</li>
		<li>cons : (x (listof x) -&gt; (listof x))</li>
		<li>cons? : (any -&gt; boolean)</li>
		<li>eighth : ((listof y) -&gt; y)</li>
		<li>empty? : (any -&gt; boolean)</li>
		<li>first : ((cons y (listof x)) -&gt; y)</li> 
		<li>length : (list -&gt; number)</li>
		<li>list : (any ... (listof any) -&gt; (listof any))</li> 
		<li>list : (any ... -&gt; (listof any))</li>
		<li>list* : (any ... (listof any) -&gt; (listof any))</li> 
		<li>list-ref : ((listof x) natural-number -&gt; x)</li>
		<li>list? : (any -&gt; boolean)</li> 
		<li>member : (any list -&gt; (union false list))</li>
		<li>memq : (any list -&gt; (union false list))</li>
		<li>memv : (any list -&gt; (union false list))</li>
		<li>null : empty</li> 
		<li>null? : (any -&gt; boolean)</li> 
		<li>pair? : (any -&gt; boolean)</li> 
		<li>rest : ((cons y (listof x)) -&gt; (listof x))</li> 
		<li>reverse : (list -&gt; list)</li>
	</ul>
	<I>Strings</I>
	<ul class="fixme">
		<li>format : (string any ... -&gt; string)</li> 
		<li>list-&gt;string : ((listof char) -&gt; string)</li> 
		<li>make-string : (nat char -&gt; string)</li> 
		<li>string-append : (string ... -&gt; string)</li>
		<li>string-copy : (string -&gt; string)</li> 
		<li>string-length : (string -&gt; nat)</li> 
		<li>string-ref : (string nat -&gt; char)</li> 
		<li>string? : (any -&gt; boolean)</li> 
		<li>substring : (string nat nat -&gt; string)</li>
	</ul>
	<I>Misc</I>
	<ul class="fixme">
		<li>=~ : (real real non-negative-real -&gt; boolean)</li> 
		<li>eq? : (any any -&gt; boolean)</li> 
		<li>equal? : (any any -&gt; boolean)</li> 
		<li>equal~? : (any any non-negative-real -&gt; boolean)</li> 
		<li>eqv? : (any any -&gt; boolean)</li> 
		<li>error : (symbol string -&gt; void)</li> 
		<li>identity : (any -&gt; any)</li> 
		<li>struct? : (any -&gt; boolean)</li> 
	</ul>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="Func_Requirement"></a>
<h2>TPCL Requirement function</h2>
<p class="small"><a href="protocol3.php#Components">Look here</a> for more information about components.</p>

<p>
	This TPCL function is called (on all components which are in a design)
	when adding a new component is added to a design. 
</p><p>
	If the component is  allowed to be added to a design then the function 
	should return a pair with True and a string to be displayed (empty strings 
	are acceptable), otherwise it should return a pair with false and a string 
	which describes the reason for not being able to add the component. 
</p><p>
	The function is given a design object which has appears as if the 
	component was already added. 
</p><p>

<h3>Examples</h3>

<p>
	The most basic case which always allows this component to be
	added,
<pre class="nclcode">
(lambda (design)
	(cons #t ""))
</pre>
</p>

<p>
	An more advanced case would be the &quot;Personal Pod&quot;
	which cannot be added to any Design where the radiation level
	is above one.
<pre class="nclcode">
(lambda (design)
	(if (&gt; (designtype.radiation design) 1)
		(cons #t &quot;&quot;)
		(cons #f &quot;Radiation Level is too high for Personal Pod to be added&quot;)
	)
)
</pre>
</p>

<p>
	Another example would be the &quot;Sheep Skin&quot; component which only
	provides shields on unarmed ships.
<pre class="nclcode">
(lambda (design)
	(if (&gt; (designtype.firepower design) 1)
		(cons #t &quot;Sheep Skin cannot provide shields as the ship is armed&quot;)
		(cons #t &quot;&quot;)
	)
)
</pre>
</p>


<a name="Func_PropertyValue"></a>
<h2>TPCL Property Value function</h2>
<p class="small">
	<a href="protocol3.php#Components">Look here</a> for more information about components.
	<a href="protocol3.php#Properties">Look here</a> for more information about properties.
</p>

<p>
	A TPCL function which is called to work out the amount this component contributes to a property. It should return a valid number. It is given the current design.
</p>

<h3>Examples</h3>

<p>
	The most basic case where the component has a constant value for this property,
<pre class="nclcode">
(lambda (design)
	1)
</pre>
</p>

<p>
	A more advanced example would be the &quot;Sheep Skin&quot; component will only have a cloaking effect if the design has no firepower.

<pre class="nclcode">
(lambda (design)
	(if (&gt; (designtype.firepower design) 0)
		0 100))
</pre>

<p>
	This function can not depend on any property which has an rank which
	is less then or equal to this property.
</p><p>
	For example if the &quot;firepower&quot; property was
	order 1 and the &quot;cloaking&quot; property was order 0,
	then the cloaking property can not depend on the firepower
	property. This would mean the &quot;Sheep Skin&quot; would
	be an invalid component. This is needed to stop circular
	dependency such as,

	<ul>
		<li>&quot;Blaster&quot;, only provides firepower if the ship has no shields</li>
		<li>&quot;Sheep Skin&quot;, only provides shields if the ship has no firepower</li>
	</ul>
</p>


<a name="Func_PropertyCalculate"></a>
<h2>TPCL Property Calculate function</h2>
<p class="small"><a href="protocol3.php#Properties">Look here</a> for more information about properties.</p>

<p>
	A TPCL function which is called to work out how to display the
	property.
</p><p>
	It should return a pair which contains the actual
	value and a string which will be displayed (The string could be
	anything from &quot;3.39 psi&quot; to &quot;35 Sheep of Possible
	100 Sheep&quot;). 
</p><p>
	It is called with the current design and a list containing the value
	each component contributes to the property.
</p><p>
	It is important that the function is not dependent on the list being in
	any order. If order is required the function must first sort it. (For
	example calling with [10, 4, 5] should return the same result as calling
	with [5, 4, 10] or [4, 5, 10].)
</p><p>
	This function can not depend on any property which has
	an rank which is less then or equal to this property.
</p>


<h3>Examples</h3>

<p>
	A simple linear example which displays &quot;10 PSI&quot;,
	
<pre class="nclcode">
(lambda (design, bits)
	(let ((n (apply + bits)))
		(cons n
			(string-append (number-&gt;string n) &quot; PSI&quot;)
		)
	)
)
</pre>
</p>

<p>
	A more advanced linear example which displays different units
	depending on the value of the input

<pre class="nclcode">
(lambda (design, bits)
	(let ((n (apply + bits)))
		(cond			  
			((&lt; n 100) (cons n (string-append n &quot; grams&quot;)) )  
			((&lt; n 1000) (cons (/ n 100) (string-append n &quot; kilograms&quot;)) )
			((&lt; n 10000) (cons (/ n 1000) (string-append n &quot; tons&quot;)) )
		)
	)
)
</pre>
</p>

<p>
	A compound example which depends only on other properties, calculates
	acceleration,

<pre class="nclcode">
(lambda (design, bits)
	(let ((n (/ (designtype.force design) (designtype.mass design))))
		(cons n (string-append n &quot; m/s^2&quot;))
	)
)
</pre>
</p>

<p>
	A compound example which depends on both other properties and the bits,
	calculates the cloaking,

<pre class="nclcode">
(lambda (design, bits)
	(let ((n (/ (apply + bits) (designtype.mass design)))
		(set! n (/ n (n+1)))
		(cons n (string-append (number-&gt;string n) &quot; %&quot;))
	)
)
</pre>
</p>

<h1>Implmentation Tips</h1>

<p>
	At first figuring out how to calculate all this seems
	hard, but it turns out to be quite easy.
</p><p>
	Firstly we need to understand the difference between the a Property 
	and the PropertyValue on each component. A PropertyValue evaluates to
	the value of the property for a specific component. A Property takes 
	a list of values (that evaluating PropertyValues has produced) and 
	calculates the overall value of the property for the design. 
</p><p>
	With this in mind it is easy to see how to calculate the design.

<h3>Step 1</h3>

<p>
	Loop over all the components in a design and collect
	their properties into a list ordered on their order.
</p><p>
	The following code in pseudo-python should serve as
	an example,

<pre class="code">
 properties = {}
 for component in components:
	 for propertyvalue in component.properties:
		 order = propertyvalue.property.order
		 if not properties.has_key(order):
			 properties[order] = []
		 if propertyvalue.property not in properties[order]:
			 properties[order].append(propertyvalue.property)
</pre>

	With the following input,

<pre class="code">
 components = [
   &lt;Large Solar Sail [
	   PropertyValue(EnergyPerYear)]&gt;
   &lt;Large Jump Engine [
	   PropertyValue(RequiredEnergy),
	   PropertyValue(RechargeTime)]&gt;
 ] 
 # Where EnergyPerYear and RequiredEnergy are both order 1 and RechargeTime is order 2
</pre>

	You get the following output

<pre class="code">
 { 1: [Property(EnergyPerYear), Property(RequiredEnergy)],
   2: [Property(RechargeTime)]}
</pre>

<h3>Step 2</h3>

<p>
	Create an empty &quot;design&quot; storage object
</p>

<h3>Step 3</h3>

<p>
	Loop over the newly created collection, for each
	property, evaluate the property value for each component and then evaluate
	the property with the property values.
</p></p>
	Something like the below pseudo-python code should serve as an example,

<pre class="code">
 keys = properties.keys()
 keys.sort()

 for key in keys:
	 for property in properties[key]:
		 bits = []

		 # This evaluates the property value for each component
		 for component in components:
			 if component.has_property(property):
				 bits.append(component.get_property(property.name).eval(design))

		 # This evaluates the overall value of the property
		 value, text = property.eval(design, bits)
		 setattr(design, property.name, value)

		 # Do something with the property text here...
		 do_something(text)		
</pre>
</p>

<?php
	include "../bits/end_section.inc"; include "../bits/end_page.inc";
?>

