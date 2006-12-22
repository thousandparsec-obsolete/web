<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
  xmlns:xsl='http://www.w3.org/1999/XSL/Transform'
  xmlns:xlink="http://www.w3.org/1999/xlink" >

  <xsl:output method="xml" omit-xml-declaration="yes" encoding="UTF-8" standalone="no" media-type="text/html" indent="yes" />

  <xsl:template match="protocol">
    <xsl:element name="h2">
      <xsl:attribute name="id"><xsl:text>TOC</xsl:text></xsl:attribute>
      <xsl:text>Table of Contents</xsl:text>
    </xsl:element>
    <xsl:element name="ul">
      <xsl:attribute name="class"><xsl:text>TOC</xsl:text></xsl:attribute>
      <xsl:apply-templates select="descendant::packet" mode="toc" />
    </xsl:element>
    <xsl:processing-instruction name="php">

	include "../bits/end_section.inc";
	include "../bits/start_section.inc";

    </xsl:processing-instruction>
    <xsl:element name="h2">
      <xsl:attribute name="id"><xsl:text>Summary</xsl:text></xsl:attribute>
      <xsl:text>Summary</xsl:text>
    </xsl:element>
    <xsl:element name="table">
      <xsl:attribute name="class"><xsl:text>tabular</xsl:text></xsl:attribute>
      <xsl:element name="tr">
        <xsl:element name="th"><xsl:text>Value</xsl:text></xsl:element>
	<xsl:element name="th"><xsl:text>Name</xsl:text></xsl:element>
	<xsl:element name="th"><xsl:text>Description</xsl:text></xsl:element>
	<xsl:element name="th"><xsl:text>Base</xsl:text></xsl:element>
	<xsl:element name="th"><xsl:text>Dir</xsl:text></xsl:element>
	<xsl:element name="th"><xsl:text>Responses</xsl:text></xsl:element>
      </xsl:element>
      <xsl:apply-templates select="descendant::packet" mode="summary" />
    </xsl:element>
    <xsl:processing-instruction name="php">

	include "../bits/end_section.inc";
	include "../bits/start_section.inc";

    </xsl:processing-instruction>
    <xsl:element name="h2">
      <xsl:attribute name="id"><xsl:text>Packets</xsl:text></xsl:attribute>
      <xsl:text>Packets</xsl:text>
    </xsl:element>
    <xsl:apply-templates select="descendant::packet" mode="description"/>
  </xsl:template>

  <xsl:template match="packet" mode="description">
    <xsl:element name="h3">
      <xsl:attribute name="id"><xsl:text>Desc_</xsl:text><xsl:value-of select="@name"/></xsl:attribute>
      <xsl:value-of select="@name"/><xsl:text> Frame</xsl:text>
    </xsl:element>
    <xsl:element name="p">
      <xsl:value-of select="description"/>
    </xsl:element>
    <xsl:element name="p">
      <xsl:if test="@base">
	<xsl:text>The frame starts with the </xsl:text><xsl:value-of select="@base" /><xsl:text> frame. </xsl:text>
      </xsl:if>
      <xsl:if test="child::structure">
	<xsl:text>The </xsl:text><xsl:value-of select="@name"/><xsl:text> frame</xsl:text>
	<xsl:if test="@base"><xsl:text> then</xsl:text></xsl:if>
	<xsl:text> consists of:</xsl:text>
      </xsl:if>
    </xsl:element>
    <xsl:if test="child::structure">
      <xsl:element name="ul">
	<xsl:apply-templates select="child::structure/*" mode="description"/>
      </xsl:element>
    </xsl:if>
    
    
    <xsl:if test="child::note">
      <xsl:element name="p">
        <xsl:value-of select="note" disable-output-escaping="yes" />
      </xsl:element>
    </xsl:if>
  </xsl:template>

  <xsl:template match="string" mode="description">
    <xsl:element name="li">
      <xsl:text>a string, the </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text>, </xsl:text>
      <xsl:value-of select="description" />
    </xsl:element>
  </xsl:template>
  
  <xsl:template match="character" mode="description">
    <xsl:element name="li">
      <xsl:value-of select="@size" />
      <xsl:text> characters, the </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text>, </xsl:text>
      <xsl:value-of select="description" />
    </xsl:element>
  </xsl:template>
  
  <xsl:template match="integer" mode="description">
    <xsl:element name="li">
      <xsl:value-of select="@size" />
      <xsl:text> bit </xsl:text>
      <xsl:value-of select="@type" />
      <xsl:text> integer, the </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text>, </xsl:text>
      <xsl:value-of select="description" />
    </xsl:element>
  </xsl:template>
  
  <xsl:template match="enumeration" mode="description">
    <xsl:element name="li">
      <xsl:value-of select="@size" />
      <xsl:text> bit </xsl:text>
      <xsl:value-of select="@type" />
      <xsl:text> enumeration, the </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text>, </xsl:text>
      <xsl:value-of select="description" />
      <xsl:text> The values of </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text> can be:</xsl:text>
      <xsl:element name="ul">
	<xsl:apply-templates select="values/value" mode="description" />
      </xsl:element>
    </xsl:element>
  </xsl:template>
  
  <xsl:template match="value" mode="description">
    <xsl:element name="li">
      <xsl:value-of select="@id" />
      <xsl:text> - </xsl:text>
      <xsl:value-of select="." />
    </xsl:element>
  </xsl:template>
  
  <xsl:template match="list" mode="description">
    <xsl:element name="li">
      <xsl:text>a list, the </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text>, </xsl:text>
      <xsl:value-of select="description" />
      <xsl:text> The </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text> list contains:</xsl:text>
      <xsl:element name="ul">
	<xsl:apply-templates select="structure/*" mode="description" />
      </xsl:element>
    </xsl:element>
  </xsl:template>
  
  <xsl:template match="group" mode="description">
    <xsl:element name="li">
      <xsl:text>a group, the </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text>, </xsl:text>
      <xsl:value-of select="description" />
      <xsl:text> The </xsl:text>
      <xsl:value-of select="longname" />
      <xsl:text> group contains:</xsl:text>
      <xsl:element name="ul">
	<xsl:apply-templates select="structure/*" mode="description" />
      </xsl:element>
    </xsl:element>
  </xsl:template>
  
  
  <xsl:template match="packet" mode="toc">
    <xsl:element name="li">
      <xsl:element name="a">
        <xsl:attribute name="href"><xsl:text>#Desc_</xsl:text><xsl:value-of select="@name"/></xsl:attribute>
        <xsl:value-of select="@name"/><xsl:text> Frame</xsl:text>
      </xsl:element>
    </xsl:element>
  </xsl:template>
  
  
  
  
  <xsl:template match="packet" mode="summary">
    <xsl:element name="tr">
      <xsl:attribute name="class"><xsl:text>row</xsl:text><xsl:value-of select="position() mod 2" /></xsl:attribute>
      <xsl:element name="td">
        <xsl:attribute name="class"><xsl:text>numeric</xsl:text></xsl:attribute>
	<xsl:value-of select="@id" /></xsl:element>
      <xsl:element name="td">
        <xsl:element name="a">
          <xsl:attribute name="href"><xsl:text>#Desc_</xsl:text><xsl:value-of select="@name"/></xsl:attribute>
	  <xsl:value-of select="@name" /><xsl:text> Frame</xsl:text>
        </xsl:element>
      </xsl:element>
      <xsl:element name="td"><xsl:value-of select="description" /></xsl:element>
      <xsl:element name="td"><xsl:value-of select="@base" /></xsl:element>
      <xsl:element name="td"><xsl:value-of select="direction" /></xsl:element>
      <xsl:element name="td"></xsl:element>
    </xsl:element>
  </xsl:template>
  
</xsl:stylesheet>