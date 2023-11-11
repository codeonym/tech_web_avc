<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match='/'>
    <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html" />
      </head>
      <body>
        <table border="1" cellspacing="0" cellpadding="30">
          <thead>
            <tr>
              <th>Titres</th>
              <th>Auteur</th>
              <th>Ref</th>
            </tr>
          </thead>
          <tbody>
            <xsl:for-each select="bibliotheque/livre">
              <xsl:sort select="titre" />
              <tr>
                <td>
                  <xsl:value-of select="titre" />
                </td>
                <td>
                  <xsl:value-of select="auteur" />
                </td>
                <td>
                  <xsl:value-of select="ref" />
                </td>
              </tr>
            </xsl:for-each>
          </tbody>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>