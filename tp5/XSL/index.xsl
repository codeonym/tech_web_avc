<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <meta http-equiv="content-type" content="text/html ; charset=UTF-8" />
        <title>
          <xsl:value-of select="class/@list-of" />
        </title>
      </head>
      <body>
        <h1>STUDENTS</h1>
        <table border="1" cellspacing="0" cellpadding="30">
          <thead>
            <tr>
              <th>Roll No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Nick name</th>
              <th>Marks</th>
            </tr>
          </thead>
          <tbody>
          <xsl:apply-templates select="class/student">
            <xsl:sort select="firstname"/>
          </xsl:apply-templates>
          </tbody>
        </table>
      </body>
    </html>
  </xsl:template>
  <xsl:template match="student">
    <tr>
      <td>
        <xsl:value-of select="@rollno" />
      </td>
      <td>
        <xsl:value-of select="firstname" />
      </td>
      <td>
        <xsl:value-of select="lastname" />
      </td>
      <td>
        <xsl:value-of select="nickname" />
      </td>
      <xsl:choose>
        <xsl:when test="marks &gt; 90">
          <td style='color:#fff;background-color:green'>
            <xsl:value-of select="marks" />
          </td>
        </xsl:when>
        <xsl:otherwise>
          <td>
            <xsl:value-of select="marks" />
            <xsl:if test="marks &lt; 60">
              <span style="color:red;font-size:20px;font-weight:900">*</span>
            </xsl:if>
          </td>
        </xsl:otherwise>
      </xsl:choose>
    </tr>
  </xsl:template>
</xsl:stylesheet>