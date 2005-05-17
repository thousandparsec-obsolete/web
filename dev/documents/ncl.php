<?php $title = "NCL" ?>

<?php include "../bits/start_page.inc" ?>

<?php include "../bits/start_section.inc" ?>

<p>Last updated: 16 May 2005</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<FONT COLOR="#008200">Version 2 changes are marked in green.</FONT><BR>
<FONT COLOR="#008284">Version 3 changes are marked in blue.</FONT><BR>
<BR>
The aim is to allow all designs to be made client side without any interaction with the server. This should make the designing experience much more pleasant for the user. If all goes well a similar scheme may be extended to the order stuff.<BR>
<BR>
To do this I am going to define a scheme like language which the client will interpret. This language will be close enough to scheme that any scheme interpreter should be able to be used. Scheme was choose for these reasons, 
<UL>
    <LI>The language is extremely simple. 
    <LI>It has been already be used as an embedded language. 
    <LI>It has a large number of resources for learning and coding scheme. 
    <LI>Interpreters exist for C, C++, Python and Java. 
    <LI>There is plenty of academic documentation on implementing your own scheme interpreter and it turns out to be a pretty trivial task. 
</UL>
This language will be referred to as the &quot;New Component Language&quot; (or NCL for short). Where there is not enough information in this specification please refer to the R5RS Scheme standard for more information.&nbsp; All NCL functions are deterministic, this means that given the same input they will produce the same output.<BR>
<BR>
There are 4 parts to the Component/Design stuff, 
<UL>
    <LI>Components, 
    <BLOCKQUOTE>
        The base building blocks for building designs 
    </BLOCKQUOTE>
    <LI>Properties, 
    <BLOCKQUOTE>
        Numerical values which describe aspects of designs and components 
    </BLOCKQUOTE>
    <LI>Categories, 
    <BLOCKQUOTE>
        An organisation unit for grouping components/designs/properties 
    </BLOCKQUOTE>
    <LI>Designs, 
    <BLOCKQUOTE>
        A combination of Components into a useful object 
    </BLOCKQUOTE>
</UL>
<H1>
<B><FONT SIZE="6">Components</FONT></B>
</H1>
<BR>
Each Component has the following structure, 
<UL>
    <LI>a UInt32, the ID of the Component 
    <LI>a list of UInt32, IDs of Categories the Component is in 
    <LI>a String, name of the component</LI>
    <LI>a String, description of the component</LI>
    <LI>a String, NCL Add function 
    <BLOCKQUOTE>
        A NCL function which is called when adding this component to a design. If the component is allowed to be added to <FONT COLOR="#0000ff">a design then the function should return a pair with True and a string to be displayed, otherwise it should return a pair with false and a string which describes the reason for not being able to add the component. The function is given the design object which it is being added to. </FONT><BR>
        <BR>
        The most basic case which always allows this component to be added,<BR>
        <BLOCKQUOTE>
            <FONT COLOR="#0000ff">(lambda (design) </FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp; (cons #t &quot;&quot;))</FONT><BR>
        </BLOCKQUOTE>
        An more advanced case would be the &quot;Personal Pod&quot; which cannot be added to any Design where the radiation level is above one.<BR>
        <BLOCKQUOTE>
            <FONT COLOR="#0000ff">(lambda (design)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp; (if (&gt; design.radiation 1)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #t &quot;&quot;)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #f &quot;Radiation Level is too high for Personal Pod to be added&quot;)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp; )</FONT><BR>
            <FONT COLOR="#0000ff">)</FONT><BR>
        </BLOCKQUOTE>
        <FONT COLOR="#0000ff">Another example would be the &quot;Sheep Skin&quot; component which only provides shields on unarmed ships.</FONT><BR>
        <BLOCKQUOTE>
            <FONT COLOR="#0000ff">(lambda (design)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp; (if (&gt; design.firepower 1)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #t &quot;Sheep Skin cannot provide shields as the ship is armed&quot;)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons #t &quot;&quot;)</FONT><BR>
            <FONT COLOR="#0000ff">&nbsp;&nbsp;&nbsp; )</FONT><BR>
            <FONT COLOR="#0000ff">)</FONT> 
        </BLOCKQUOTE>
    </BLOCKQUOTE>
    <LI>a list of 
    <BLOCKQUOTE>
        a UInt32, ID of the property this is a String, NCL Property function <BR>
        <BLOCKQUOTE>
            A NCL function which is called to work out the amount this component contributes to a property. It should return a valid number. It is given the current design.<BR>
            <BR>
            The most basic case where the component has a constant value for this property,<BR>
            <BLOCKQUOTE>
                (lambda (design)<BR>
                &nbsp;&nbsp;&nbsp; 1) <BR>
            </BLOCKQUOTE>
            A more advanced example would be the &quot;Sheep Skin&quot; component will only have a cloaking effect if the design has no firepower.<BR>
            <BLOCKQUOTE>
                (lambda (design)<BR>
                &nbsp;&nbsp;&nbsp; (if (&gt; design.firepower 0) 0 100))<BR>
            </BLOCKQUOTE>
        </BLOCKQUOTE>
    </BLOCKQUOTE>
</UL>
<BLOCKQUOTE>
    <BLOCKQUOTE>
        <BLOCKQUOTE>
            <B>This function can not depend on any property which has an order which is less then or equal to this property. </B><BR>
            For example if the &quot;firepower&quot; property was order 1 and the &quot;cloaking&quot; property was order 0, then the cloaking property can not depend on the firepower property. This would mean the &quot;Sheep Skin&quot; would be an invalid component. This is needed to stop circular dependency such as,<BR>
            <BLOCKQUOTE>
                &quot;Blaster&quot;, only provides firepower if the ship has no shields<BR>
                &quot;Sheep Skin&quot;, only provides shields if the ship has no firepower 
            </BLOCKQUOTE>
        </BLOCKQUOTE>
    </BLOCKQUOTE>
</BLOCKQUOTE>
<H1>
<B><FONT SIZE="6">Properties</FONT></B>
</H1>
Each Property has, 
<UL>
    <LI>a UInt32, ID of the Property 
    <LI>a UInt32, order of the property (IE the order the properties are calculated in) 
    <LI>a String, the name of the Property 
    <LI>a String, a description of the Property 
    <LI>a String, NCL Display function, 
    <BLOCKQUOTE>
        A NCL function which is called to work out how to display the property. It should return a pair which contains the actual value and a string which will be displayed (The string could be anything from &quot;3.39 psi&quot; to &quot;35 Sheep of Possible 100 Sheep&quot;). <FONT COLOR="#008200">It is called with the current design and a list containing the value each component contributes to the property. </FONT><BR>
        <BR>
        <FONT COLOR="#008200">It is important that the function is not dependent on the list being in any order. If order is required the function must first sort it. (For example calling with [10, 4, 5] should return the same result as calling with [5, 4, 10] or [4, 5, 10].)</FONT><BR>
        <BR>
        <B><FONT COLOR="#008200">This function can not depend on any property which has an order which is less then or equal to this property. </FONT></B><BR>
        <BR>
        A simple linear example which displays &quot;10 PSI&quot;,<BR>
        <BLOCKQUOTE>
            (lambda (design, bits)<BR>
            &nbsp;&nbsp;&nbsp; (let ((n (apply + bits)))<BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons n (string-append n &quot; PSI&quot;))<BR>
            &nbsp;&nbsp;&nbsp; )<BR>
            )<BR>
        </BLOCKQUOTE>
        A more advanced linear example which displays different units depending on the value of the input<BR>
        <BLOCKQUOTE>
            (lambda (design, bits)<BR>
            &nbsp;&nbsp;&nbsp; (let ((n (apply + bits)))<BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cond <BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ((&lt; n 100) (cons n (string-append n &quot; grams&quot;)) )<BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ((&lt; n 1000) (cons (/ n 100) (string-append n &quot; kilograms&quot;)) )<BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ((&lt; n 10000) (cons (/ n 1000) (string-append n &quot; tons&quot;)) )<BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )<BR>
            &nbsp;&nbsp;&nbsp; )<BR>
            )<BR>
        </BLOCKQUOTE>
        <FONT COLOR="#008200">A compound example which depends only on other properties, calculates acceleration,</FONT><BR>
        <BLOCKQUOTE>
            <FONT COLOR="#008200">(lambda (design, bits)</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp; (let ((n (/ design.force design.mass)))</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons n (string-append n &quot; m/s^2&quot;))</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp; )</FONT><BR>
            <FONT COLOR="#008200">)</FONT><BR>
        </BLOCKQUOTE>
        <FONT COLOR="#008200">A compound example which depends on both other properties and the bits, calculates the cloaking,</FONT><BR>
        <BLOCKQUOTE>
            <FONT COLOR="#008200">(lambda (design, bits)</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp; (let ((n (/ (apply + bits) design.mass)))</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (set! n (/ n (n+1)))</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (cons n (string-append n &quot; %&quot;))</FONT><BR>
            <FONT COLOR="#008200">&nbsp;&nbsp;&nbsp; )</FONT><BR>
            <FONT COLOR="#008200">)</FONT><BR>
        </BLOCKQUOTE>
        <BR>
    </BLOCKQUOTE>
</UL>
<H1>
<B><FONT SIZE="6">Designs</FONT></B>
</H1>
<BR>
Each Design has, 
<UL>
    <LI>a UInt32, the ID of the Design 
    <LI>a list of UInt32, IDs of Categories the Design is in 
    <LI>a String, the name of the design</LI>
    <LI>a String, a description of the design</LI>
    <LI><FONT COLOR="#008200">a SInt32</FONT>, the number of times the Design is in use 
    <LI><FONT COLOR="#008200">a SInt32, the owner of the Design</FONT> 
    <LI>a list of UInt32, IDs of the Components which are in a Design
</UL>
<B><FONT COLOR="#008200">Notes:</FONT></B><BR>
<FONT COLOR="#008200">If the design is unusable then the number of times in use will be -1.</FONT><BR>
<FONT COLOR="#008200">If the owner is unknown the field will be -1, otherwise it will be the ID of the player who owns the design.</FONT><BR>
<BR>
<BR>
<BR>
<BR>
<H1>
<B><FONT SIZE="6">Categories</FONT></B>
</H1>
Each Category has, 
<UL>
    <LI>a UInt32, ID of the Category 
    <LI>a String, the name of the Category 
    <LI>a UInt32, the type of the Category (Component, Design, Property) 
    <LI>a list of UInt32, IDs of the things in the Category
</UL>
<H1>
<B><FONT SIZE="6"><FONT COLOR="#008200">How to Calculate?</FONT></FONT></B>
</H1>
<FONT COLOR="#008200">At first figuring out how to calculate all this seems hard, but it turns out to be quite easy. </FONT><BR>
<BR>
<FONT COLOR="#008200">Firstly we need to understand the difference between the base Property and the PropertyValue on each component. A PropertyValue evaluates to the value of the property for a specific to a component. A Property takes a list of values that evaluating PropertyValues has produced and calculates the value of the property for the whole design. With this in mind it is easy to see how to calculate the design.</FONT> 
<H4>
<B><FONT COLOR="#008200">Step 1.</FONT></B>
</H4>
<FONT COLOR="#008200">Loop over all the components in a design and collect their properties into a list ordered on their order.</FONT><BR>
<BR>
<FONT COLOR="#008200">The following code in pseudo-python should serve as an example,</FONT> 
<PRE>
<FONT COLOR="#008200">properties = {}</FONT>
<FONT COLOR="#008200">for component in components:</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp; for propertyvalue in component.properties:</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; order = propertyvalue.property.order</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if not properties.has_key(order):</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; properties[order] = []</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if propertyvalue.property not in properties[order]:</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; properties[order].append(propertyvalue.property)</FONT>
</PRE>
<FONT COLOR="#008200">With the following input,</FONT> 
<PRE>
<FONT COLOR="#008200">components = [</FONT>
<FONT COLOR="#008200">&nbsp; &lt;Large Solar Sail [</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PropertyValue(EnergyPerYear)]&gt;</FONT>
<FONT COLOR="#008200">&nbsp; &lt;Large Jump Engine [</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PropertyValue(RequiredEnergy),</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PropertyValue(RechargeTime)]&gt;</FONT>
<FONT COLOR="#008200">] </FONT>

<FONT COLOR="#008200"># Where EnergyPerYear and RequiredEnergy are both order 1 and RechargeTime is order 2</FONT>
</PRE>
<FONT COLOR="#008200">You get the following output</FONT> 
<PRE>
<FONT COLOR="#008200">{ 1: [Property(EnergyPerYear), Property(RequiredEnergy)],</FONT>
<FONT COLOR="#008200">&nbsp; 2: [Property(RechargeTime)]}</FONT>
</PRE>
<H4>
<B><FONT COLOR="#008200">Step 2:</FONT></B>
</H4>
<FONT COLOR="#008200">Create an empty &quot;design&quot; storage object</FONT> 
<H4>
<B><FONT COLOR="#008200">Step 3:</FONT></B>
</H4>
<FONT COLOR="#008200">Loop over the newly created collection, for each property, evaluate the property value for each component and then evaluate the property with the property values.</FONT><BR>
<BR>
<FONT COLOR="#008200">Something like the below pseudo-python code should serve as an example,</FONT> 
<PRE>
<FONT COLOR="#008200">keys = properties.keys()</FONT>
<FONT COLOR="#008200">keys.sort()</FONT>

<FONT COLOR="#008200">for key in keys:</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp; for property in properties[key]:</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; bits = []</FONT>

<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # This evaluates the property value for each component</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for component in components:</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if component.has_property(property):</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; bits.append(component.get_property(property.name).eval(design))</FONT>

<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # This evaluates the overall value of the property</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; value, text = property.eval(design, bits)</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; setattr(design, property.name, value)</FONT>

<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # Do something with the property text here...</FONT>
<FONT COLOR="#008200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; do_something(text)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </FONT>
</PRE>
<BR>

<H1>
<FONT COLOR="#008284">New Component Language</FONT><BR>
</H1>
<BR>
<BR>
<H2>Syntax</H2>

<H2>2 Lexical conventions</H2>
The language is completely compatible with scheme in this regard.

<H2>3 Basic concepts</H2>

<H3>3.1 Variables, Syntactic Keywords and Regions</H3>
The language is compatible with scheme in this regard. However some of the functions referenced in this section are not avalible. See section 4 for more details.

<H3>3.2 Disjointness of Types</H3>
The language is compatible with shceme in this regard. However neither vector or port types (and associated functions) are avalible.

<H3>3.3 External Representations</H3>
The language is compatible with scheme in this regard. Please note that because there is no input or output neither "read" and "write" are implimented.

<H3>3.4 Storage Model</H3>
    Full.

<H3>3.5 Proper Tail Recursion</H3>
While proper tail recursion is recommened it is not required.

<H2>4 Expressions</H2>

<H3>4.1.1 Variable References</H3>
The language is compatible with scheme in this regard.

<H3>4.1.2 Literal Expressions</H3>
The language is compatible with scheme in this regard.

<H3>4.1.3 Procedure Calls</H3>
The language is compatible with scheme in this regard.

<H3>4.1.4 Procedures</H3>
The language is compatible with scheme in this regard.

<H3>4.1.5 Conditionals</H3>
The language is compatible with scheme in this regard.

<H3>4.1.6 Assignments</H3>
The language is compatible with scheme in this regard.

<H3>4.2.1 Conditionals</H3>
The language is compatible with scheme in this regard.

<H3>4.2.2 Bindings constructs</H3>
NCL language only has let and let*, letrec is not avalible.

<H3>4.2.3 Sequencing</H3>
    Not implemented. 

<H3>4.2.4 Iteration</H3>
    Not implemented. 

<H3>4.2.5 Delayed Evaluation</H3>
Delayed Evalutation is not supported.

<H3>4.2.6 Quasiquotation</H3>
    Not implemented.

<H3>4.3 Macros</H3>
NCL language does not include support for macros.

<H2>5 Expressions</H2>

<H3>5.1 Programs</H3>
    Full.

<H3>5.2 Definitions</H3>
    Full. 

<H3>5.3 Syntax Definitions</H3>
NCL language does not include support of syntax definitions.

<H2>6 Standard procedures</H2>

<H3>6.1 Equivalence Predicates</H3>
NCL language includes all Scheme equivalence predicates.

<H3>6.2.1 Numerical Types</H3>
NCL only include reals, no other numerical types are avalible.

<H3>6.2.2 Exactness</H3>
As there only reals implimented exactness make no sense. No exactness functions are avalible.

<H3>6.2.3 Implementation Restrictions</H3>
NCL requires that IEEE 64-bit floating point standards be followed for reals.

<H3>6.2.4 Syntax of Numerical Constants</H3>
    Only integer constants without a # are recognized. 

<H3>6.2.5 Numerical operations</H3>
As 

    The following procedures are not implemented: complex?, real?, rational?, integer?, exact?, inexact?, max, min, gcd, lcm, numerator, denominator, floor, ceiling, truncate, round, rationalize, atan, sqrt, make-rectangular, make-polar, real-part, imag-part, magnitude, angle, exact->inexact, inexact->exact 

<H3>6.2.6 Numerical Input and Output</H3>

    Not implemented.

<H3>6.3.1 Booleans</H3>
The language is compatible with scheme in this regard.

<H3>6.3.2 Pairs and Lists</H3>
The language is compatible with scheme in this regard.

<H3>6.3.3 Symbols</H3>
The language is compatible with scheme in this regard.

<H3>6.3.4 Characters</H3>
The language is compatible with scheme in this regard.

<H3>6.3.5 Strings</H3>
The language is compatible with scheme in this regard.

<H3>6.3.6 Vectors</H3>
The language does not support vectors.

<H3>6.4 Control Features</H3>
    The following procedures are not implemented: apply, map, for-each, force, call-with-current-continuation, values, call-with-values, dynamic wind


    The following procedures are not avalible, for-each, force, call-with-current-continuation, values, call-with-values, dynamic-wind

<H3>6.5 Eval</H3>
The language does not have eval.

<H3>6.6 Input and output</H3>
The language doesn't have input and output functions.

<BR>
<BR>

<FONT COLOR="#008284">The NCL has the followings types,</FONT> 
<UL>
    <LI><FONT COLOR="#008284">Reals, Implemented be implimented so that precision is that of a standard double</FONT> 
    <LI><FONT COLOR="#008284">Booleans, </FONT> 
    <LI><FONT COLOR="#008284">Chars and Strings, All Strings are in UTF-8</FONT> 
    <LI><FONT COLOR="#008284">Pairs and Lists, </FONT> 
    <LI><FONT COLOR="#008284">Design Structure, </FONT>
</UL>
<FONT COLOR="#008284">NCL does not support the following normal scheme types,</FONT> 
<UL>
    <LI><FONT COLOR="#008284">Rationals, Rational numbers are not supported, use Reals instead </FONT>
    <LI><FONT COLOR="#008284">Complex, Complex numbers are not supported, use a Pair of Reals instead</FONT>
    <LI><FONT COLOR="#008284">Vectors, Vectors are not supported, use Lists instead</FONT> 
    <LI><FONT COLOR="#008284">Integers, Integers are not supported, use Reals instead</FONT> 
    <LI><FONT COLOR="#008284">Object/Classes, there should be no use for these as NCL is only for small functions with no persistent state</FONT>
</UL>
<BR>
<FONT COLOR="#008284">NCL also does not include the following normal scheme features,</FONT> 
<UL>
    <LI><FONT COLOR="#008284">Ability to define new structures</FONT> 
    <LI><FONT COLOR="#008284">Any input or output (include all functions related to input and output)</FONT> 
    <LI><FONT COLOR="#008284">Macros</FONT> 
</UL>
<BR>
<FONT COLOR="#008284">NCL does not include the following standard scheme functions,</FONT> <BR>
<BR>
<BR>
<BR>
<BR>
<H3>
<B><FONT SIZE="4"><FONT COLOR="#008284">Standard Numerical Operators</FONT></FONT></B>
</H3>
<BR>
<UL>
    <LI><TT><FONT COLOR="#008284">* : (num num num ... -&gt; num)</FONT></TT> 
    <BLOCKQUOTE>
        <TT><FONT COLOR="#008284">Returns the product of given arguments</FONT></TT> 
    </BLOCKQUOTE>
    <LI><TT><FONT COLOR="#008284">+ : (num num num ... -&gt; num)</FONT></TT> 
    <BLOCKQUOTE>
        <TT><FONT COLOR="#008284">Returns the sum of given arguments</FONT></TT> 
    </BLOCKQUOTE>
    <LI><TT><FONT COLOR="#008284">- : (num num ... -&gt; num)</FONT></TT> 
    <BLOCKQUOTE>
        <TT><FONT COLOR="#008284">Subtracts the second (and following) number(s) from the first; Negate the number if there is only one argument.</FONT></TT> 
    </BLOCKQUOTE>
    <LI><TT><FONT COLOR="#008284">/ : (num num num ... -&gt; num)</FONT></TT> 
    <BLOCKQUOTE>
        <TT><FONT COLOR="#008284">Returns the division of the given arguments; None but the first number can be zero.</FONT></TT> <BR>
    </BLOCKQUOTE>
</UL>
<BR>
<UL>
    <LI><TT><FONT COLOR="#008284">&lt; : (real real real ... -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">&lt;= : (real real real ... -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">= : (num num num ... -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">&gt; : (real real real ... -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">&gt;= : (real real ... -&gt; boolean)</FONT></TT> 
</UL>
<BR>
<BR>
<BR>
<H3>
<B><FONT SIZE="4"><FONT COLOR="#008284">Sinusoid Functions</FONT></FONT></B>
</H3>
<FONT COLOR="#008284">All sinusoid functions work in radians.</FONT> 
<UL>
    <LI><TT><FONT COLOR="#008284">acos : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">acosh : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cos : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cosh : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">asin : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">asinh : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">sin : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">sinh : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">atan : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">atanh : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">tan : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">tanh : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">rad-&gt;deg : (num -&gt; num)</FONT></TT> 
    <BLOCKQUOTE>
        <TT><FONT COLOR="#008284">Converts radians into degrees</FONT></TT> 
    </BLOCKQUOTE>
    <LI><TT><FONT COLOR="#008284">deg-&gt;rad : (num -&gt; num)</FONT></TT> 
    <BLOCKQUOTE>
        <TT><FONT COLOR="#008284">Converts degrees into radians</FONT></TT> 
    </BLOCKQUOTE>
    <LI><TT><FONT COLOR="#008284">pi : real</FONT></TT> 
    <BLOCKQUOTE>
        <FONT COLOR="#008284">pi to exactly 12 decimal places</FONT> <BR>
    </BLOCKQUOTE>
</UL>
<BR>
<BR>
<BR>
<H3>
<B><FONT SIZE="4"><FONT COLOR="#008284">Exponential</FONT></FONT></B><BR>
<BR>
</H3>
<UL>
    <LI><TT><FONT COLOR="#008284">e : real</FONT></TT> 
    <BLOCKQUOTE>
        <FONT COLOR="#008284">e to exactly 12 decimal places</FONT> 
    </BLOCKQUOTE>
    <LI><TT><FONT COLOR="#008284">expt : (num num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">logt : (num num -&gt; num)</FONT></TT> 
</UL>
<BR>
<BR>
<H3>
<B><FONT SIZE="4"><FONT COLOR="#008284">Boolean Functions</FONT></FONT></B>
</H3>
<BR>
<UL>
    <LI><TT><FONT COLOR="#008284">boolean=? : (boolean boolean -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">boolean? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">not : (boolean -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">or : (boolean boolean ... -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">and : (boolean boolean ... -&gt; boolean)</FONT></TT> 
</UL>
<BR>
<BR>
<BR>
<BR>
<UL>
    <LI><TT><FONT COLOR="#008284">ceiling : (real -&gt; int)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">angle : (num -&gt; real)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">even? : (integer -&gt; bool)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">floor : (real -&gt; int)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">magnitude : (num -&gt; real)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">max : (real real ... -&gt; real)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">min : (real real ... -&gt; real)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">modulo : (int int -&gt; int)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">negative? : (number -&gt; bool)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">number-&gt;string : (num -&gt; string)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">number? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">odd? : (integer -&gt; bool)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">positive? : (number -&gt; bool)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">quotient : (int int -&gt; int)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">remainder : (int int -&gt; int)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">round : (real -&gt; int)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">sqr : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">sqrt : (num -&gt; num)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">zero? : (number -&gt; bool)</FONT></TT> 
</UL>
<BR>
<BR>
<BR>
<LI><I><TT><FONT COLOR="#008284">Lists</FONT></TT></I> 
<UL>
    <LI><TT><FONT COLOR="#008284">append : ((listof any) ... -&gt; (listof any))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">assq : (x (listof (cons x y)) -&gt; (union false (cons x y)))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">caaar : ((cons (cons (cons w (listof z)) (listof y)) (listof x)) -&gt; w)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">caadr : ((cons (cons (cons w (listof z)) (listof y)) (listof x)) -&gt; (listof z))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">caar : ((cons (cons z (listof y)) (listof x)) -&gt; z)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cadar : ((cons (cons w (cons z (listof y))) (listof x)) -&gt; z)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cadddr : ((listof y) -&gt; y)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">caddr : ((cons w (cons z (cons y (listof x)))) -&gt; y)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cadr : ((cons z (cons y (listof x))) -&gt; y)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">car : ((cons y (listof x)) -&gt; y)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cdaar : ((cons (cons (cons w (listof z)) (listof y)) (listof x)) -&gt; (listof z))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cdadr : ((cons w (cons (cons z (listof y)) (listof x))) -&gt; (listof y))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cdar : ((cons (cons z (listof y)) (listof x)) -&gt; (listof y))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cddar : ((cons (cons w (cons z (listof y))) (listof x)) -&gt; (listof y))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cdddr : ((cons w (cons z (cons y (listof x)))) -&gt; (listof x))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cddr : ((cons z (cons y (listof x))) -&gt; (listof x))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cdr : ((cons y (listof x)) -&gt; (listof x))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cons : (x (listof x) -&gt; (listof x))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">cons? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">eighth : ((listof y) -&gt; y)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">empty? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">first : ((cons y (listof x)) -&gt; y)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">length : (list -&gt; number)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">list : (any ... (listof any) -&gt; (listof any))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">list : (any ... -&gt; (listof any))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">list* : (any ... (listof any) -&gt; (listof any))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">list-ref : ((listof x) natural-number -&gt; x)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">list? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">member : (any list -&gt; (union false list))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">memq : (any list -&gt; (union false list))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">memv : (any list -&gt; (union false list))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">null : empty</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">null? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">pair? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">rest : ((cons y (listof x)) -&gt; (listof x))</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">reverse : (list -&gt; list)</FONT></TT> 
</UL>
<LI><I><TT><FONT COLOR="#008284">Strings</FONT></TT></I> 
<UL>
    <LI><TT><FONT COLOR="#008284">format : (string any ... -&gt; string)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">list-&gt;string : ((listof char) -&gt; string)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">make-string : (nat char -&gt; string)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">string-append : (string ... -&gt; string)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">string-copy : (string -&gt; string)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">string-length : (string -&gt; nat)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">string-ref : (string nat -&gt; char)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">string? : (any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">substring : (string nat nat -&gt; string)</FONT></TT>
</UL>
<LI><I><TT><FONT COLOR="#008284">Misc</FONT></TT></I> 
<UL>
    <LI><TT><FONT COLOR="#008284">=~ : (real real non-negative-real -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">eq? : (any any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">equal? : (any any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">equal~? : (any any non-negative-real -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">eqv? : (any any -&gt; boolean)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">error : (symbol string -&gt; void)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">identity : (any -&gt; any)</FONT></TT> 
    <LI><TT><FONT COLOR="#008284">struct? : (any -&gt; boolean)</FONT></TT>
</UL>
<BR>
<BR>
<BR>
<BR>
<TT><FONT COLOR="#008284">......... still more to come........... </FONT></TT><BR>
<BR>
<TT><FONT COLOR="#008284">Have to define the language more specifically.</FONT></TT><BR>
<BR>
<TT><FONT COLOR="#008284">Tim</FONT></TT><BR>
<BR>
<BR>

<?php
	include "../bits/end_section.inc";
	include "../bits/end_page.inc";
?>
