<option value="UTF-8" <?php echo $modx_charset=="UTF-8"? "selected='selected'" : "" ; ?> >UTF-8 (recommended)</option>
<optgroup label="ISO-8859">
    <option value="iso-8859-1" <?php echo ($modx_charset=="iso-8859-1"  || !isset($modx_charset) /* sets default */) ? "selected='selected'" : "" ; ?> >ISO 8859-1 Western European</option>
    <option value="iso-8859-2" <?php echo $modx_charset=="iso-8859-2" ? "selected='selected'" : "" ; ?> >ISO 8859-2 Latin-1 Central European</option>
    <option value="iso-8859-3" <?php echo $modx_charset=="iso-8859-3" ? "selected='selected'" : "" ; ?> >ISO 8859-3 Latin-2 South European</option>
    <option value="iso-8859-4" <?php echo $modx_charset=="iso-8859-4" ? "selected='selected'" : "" ; ?> >ISO 8859-4 Latin-3 Baltic</option>
    <option value="iso-8859-5" <?php echo $modx_charset=="iso-8859-5" ? "selected='selected'" : "" ; ?> >ISO 8859-5 Latin-4 Cyrillic</option>
    <option value="iso-8859-6" <?php echo $modx_charset=="iso-8859-6" ? "selected='selected'" : "" ; ?> >ISO 8859-6 Arabic</option>
    <option value="iso-8859-7" <?php echo $modx_charset=="iso-8859-7" ? "selected='selected'" : "" ; ?> >ISO 8859-7 Greek</option>
    <option value="iso-8859-8" <?php echo $modx_charset=="iso-8859-8" ? "selected='selected'" : "" ; ?> >ISO 8859-8 Hebrew (Visual)</option>
    <option value="iso-8859-8-i" <?php echo $modx_charset=="iso-8859-8-i" ? "selected='selected'" : "" ; ?> >ISO 8859-8-i Hebrew (Logical)</option>
    <option value="iso-8859-9" <?php echo $modx_charset=="iso-8859-9" ? "selected='selected'" : "" ; ?> >ISO 8859-9 Latin-5 Turkish</option>
    <option value="iso-8859-10" <?php echo $modx_charset=="iso-8859-10" ? "selected='selected'" : "" ; ?> >ISO 8859-10 Latin-6 Nordic</option>
    <option value="iso-8859-11" <?php echo $modx_charset=="iso-8859-11" ? "selected='selected'" : "" ; ?> >ISO 8859-11 Latin/Thai </option>
    <option value="iso-8859-13" <?php echo $modx_charset=="iso-8859-13" ? "selected='selected'" : "" ; ?> >ISO 8859-13 Latin-7 Baltic Rim </option>
    <option value="iso-8859-14" <?php echo $modx_charset=="iso-8859-14" ? "selected='selected'" : "" ; ?> >ISO 8859-14 Latin-8 Celtic</option>
    <option value="iso-8859-15" <?php echo $modx_charset=="iso-8859-15" ? "selected='selected'" : "" ; ?> >ISO 8859-15 Latin-9</option>
    <option value="iso-8859-16" <?php echo $modx_charset=="iso-8859-16" ? "selected='selected'" : "" ; ?> >ISO 8859-16 Latin-10 SE European</option>
</optgroup>
<optgroup label="Windows code pages">
    <option value="windows-1250" <?php echo $modx_charset=="windows-1250" ? "selected='selected'" : "" ; ?> >Central European cp-1250</option>
    <option value="windows-1251" <?php echo $modx_charset=="windows-1251" ? "selected='selected'" : "" ; ?> >Cyrillic cp-1251</option>
    <option value="Windows-1252" <?php echo $modx_charset=="Windows-1252" ? "selected='selected'" : "" ; ?> >Western European cp-1252</option>
    <option value="windows-1253" <?php echo $modx_charset=="windows-1253" ? "selected='selected'" : "" ; ?> >Greek cp-1253</option>
    <option value="windows-1254" <?php echo $modx_charset=="windows-1254" ? "selected='selected'" : "" ; ?> >Turkish cp-1254</option>
    <option value="windows-1255" <?php echo $modx_charset=="windows-1255" ? "selected='selected'" : "" ; ?> >Hebrew cp-1255</option>
    <option value="windows-1256" <?php echo $modx_charset=="windows-1256" ? "selected='selected'" : "" ; ?> >Arabic cp-1256</option>
    <option value="windows-1257" <?php echo $modx_charset=="windows-1257" ? "selected='selected'" : "" ; ?> >Baltic cp-1257</option>
    <option value="windows-1258" <?php echo $modx_charset=="windows-1258" ? "selected='selected'" : "" ; ?> >Vietnamese cp-1258</option>
</optgroup>
<optgroup label="Others">
    <option value="ASMO-708" <?php echo $modx_charset=="ASMO-708" ? "selected='selected'" : "" ; ?> >Arabic (ASMO 708) - ASMO-708</option>
    <option value="DOS-720" <?php echo $modx_charset=="DOS-720" ? "selected='selected'" : "" ; ?> >Arabic (DOS) - DOS-720</option>
    <option value="x-mac-arabic" <?php echo $modx_charset=="x-mac-arabic" ? "selected='selected'" : "" ; ?> >Arabic (Mac) - x-mac-arabic</option>
    <option value="ibm775" <?php echo $modx_charset=="ibm775" ? "selected='selected'" : "" ; ?> >Baltic (DOS) - ibm775</option>
    <option value="ibm852" <?php echo $modx_charset=="ibm852" ? "selected='selected'" : "" ; ?> >Central European (DOS) - ibm852</option>
    <option value="x-mac-ce" <?php echo $modx_charset=="x-mac-ce" ? "selected='selected'" : "" ; ?> >Central European (Mac) - x-mac-ce</option>
    <option value="EUC-CN" <?php echo $modx_charset=="EUC-CN" ? "selected='selected'" : "" ; ?> >Chinese Simplified (EUC) - EUC-CN</option>
    <option value="gb2312" <?php echo $modx_charset=="gb2312" ? "selected='selected'" : "" ; ?> >Chinese Simplified (GB2312) - gb2312</option>
    <option value="hz-gb-2312" <?php echo $modx_charset=="hz-gb-2312" ? "selected='selected'" : "" ; ?> >Chinese Simplified (HZ) - hz-gb-2312</option>
    <option value="x-mac-chinesesimp" <?php echo $modx_charset=="x-mac-chinesesimp" ? "selected='selected'" : "" ; ?> >Chinese Simplified (Mac) - x-mac-chinesesimp</option>
    <option value="big5" <?php echo $modx_charset=="big5" ? "selected='selected'" : "" ; ?> >Chinese Traditional (Big5) - big5</option>
    <option value="x-Chinese-CNS" <?php echo $modx_charset=="x-Chinese-CNS" ? "selected='selected'" : "" ; ?> >Chinese Traditional (CNS) - x-Chinese-CNS</option>
    <option value="x-Chinese-Eten" <?php echo $modx_charset=="x-Chinese-Eten" ? "selected='selected'" : "" ; ?> >Chinese Traditional (Eten) - x-Chinese-Eten</option>
    <option value="x-mac-chinesetrad" <?php echo $modx_charset=="x-mac-chinesetrad" ? "selected='selected'" : "" ; ?> >Chinese Traditional (Mac) - x-mac-chinesetrad</option>
    <option value="cp866" <?php echo $modx_charset=="cp866" ? "selected='selected'" : "" ; ?> >Cyrillic (DOS) - cp866</option>
    <option value="koi8-r" <?php echo $modx_charset=="koi8-r" ? "selected='selected'" : "" ; ?> >Cyrillic (KOI8-R) - koi8-r</option>
    <option value="koi8-u" <?php echo $modx_charset=="koi8-u" ? "selected='selected'" : "" ; ?> >Cyrillic (KOI8-U) - koi8-u</option>
    <option value="x-mac-cyrillic" <?php echo $modx_charset=="x-mac-cyrillic" ? "selected='selected'" : "" ; ?> >Cyrillic (Mac) - x-mac-cyrillic</option>
    <option value="x-Europa" <?php echo $modx_charset=="x-Europa" ? "selected='selected'" : "" ; ?> >Europa - x-Europa</option>
    <option value="x-IA5-German" <?php echo $modx_charset=="x-IA5-German" ? "selected='selected'" : "" ; ?> >German (IA5) - x-IA5-German</option>
    <option value="ibm737" <?php echo $modx_charset=="ibm737" ? "selected='selected'" : "" ; ?> >Greek (DOS) - ibm737</option>
    <option value="x-mac-greek" <?php echo $modx_charset=="x-mac-greek" ? "selected='selected'" : "" ; ?> >Greek (Mac) - x-mac-greek</option>
    <option value="ibm869" <?php echo $modx_charset=="ibm869" ? "selected='selected'" : "" ; ?> >Greek, Modern (DOS) - ibm869</option>
    <option value="DOS-862" <?php echo $modx_charset=="DOS-862" ? "selected='selected'" : "" ; ?> >Hebrew (DOS) - DOS-862</option>
    <option value="x-mac-hebrew" <?php echo $modx_charset=="x-mac-hebrew" ? "selected='selected'" : "" ; ?> >Hebrew (Mac) - x-mac-hebrew</option>
    <option value="ibm861" <?php echo $modx_charset=="ibm861" ? "selected='selected'" : "" ; ?> >Icelandic (DOS) - ibm861</option>
    <option value="x-mac-icelandic" <?php echo $modx_charset=="x-mac-icelandic" ? "selected='selected'" : "" ; ?> >Icelandic (Mac) - x-mac-icelandic</option>
    <option value="x-iscii-as" <?php echo $modx_charset=="x-iscii-as" ? "selected='selected'" : "" ; ?> >ISCII Assamese - x-iscii-as</option>
    <option value="x-iscii-be" <?php echo $modx_charset=="x-iscii-be" ? "selected='selected'" : "" ; ?> >ISCII Bengali - x-iscii-be</option>
    <option value="x-iscii-de" <?php echo $modx_charset=="x-iscii-de" ? "selected='selected'" : "" ; ?> >ISCII Devanagari - x-iscii-de</option>
    <option value="x-iscii-gu" <?php echo $modx_charset=="x-iscii-gu" ? "selected='selected'" : "" ; ?> >ISCII Gujarathi - x-iscii-gu</option>
    <option value="x-iscii-ka" <?php echo $modx_charset=="x-iscii-ka" ? "selected='selected'" : "" ; ?> >ISCII Kannada - x-iscii-ka</option>
    <option value="x-iscii-ma" <?php echo $modx_charset=="x-iscii-ma" ? "selected='selected'" : "" ; ?> >ISCII Malayalam - x-iscii-ma</option>
    <option value="x-iscii-or" <?php echo $modx_charset=="x-iscii-or" ? "selected='selected'" : "" ; ?> >ISCII Oriya - x-iscii-or</option>
    <option value="x-iscii-pa" <?php echo $modx_charset=="x-iscii-pa" ? "selected='selected'" : "" ; ?> >ISCII Panjabi - x-iscii-pa</option>
    <option value="x-iscii-ta" <?php echo $modx_charset=="x-iscii-ta" ? "selected='selected'" : "" ; ?> >ISCII Tamil - x-iscii-ta</option>
    <option value="x-iscii-te" <?php echo $modx_charset=="x-iscii-te" ? "selected='selected'" : "" ; ?> >ISCII Telugu - x-iscii-te</option>
    <option value="euc-jp" <?php echo $modx_charset=="euc-jp" ? "selected='selected'" : "" ; ?> >Japanese (EUC) - euc-jp</option>
    <option value="iso-2022-jp" <?php echo $modx_charset=="iso-2022-jp" ? "selected='selected'" : "" ; ?> >Japanese (JIS) - iso-2022-jp</option>
    <option value="iso-2022-jp" <?php echo $modx_charset=="iso-2022-jp" ? "selected='selected'" : "" ; ?> >Japanese (JIS-Allow 1 byte Kana - SO/SI) - iso-2022-jp</option>
    <option value="csISO2022JP" <?php echo $modx_charset=="csISO2022JP" ? "selected='selected'" : "" ; ?> >Japanese (JIS-Allow 1 byte Kana) - csISO2022JP</option>
    <option value="x-mac-japanese" <?php echo $modx_charset=="x-mac-japanese" ? "selected='selected'" : "" ; ?> >Japanese (Mac) - x-mac-japanese</option>
    <option value="shift_jis" <?php echo $modx_charset=="shift_jis" ? "selected='selected'" : "" ; ?> >Japanese (Shift-JIS) - shift_jis</option>
    <option value="ks_c_5601-1987" <?php echo $modx_charset=="ks_c_5601-1987" ? "selected='selected'" : "" ; ?> >Korean - ks_c_5601-1987</option>
    <option value="euc-kr" <?php echo $modx_charset=="euc-kr" ? "selected='selected'" : "" ; ?> >Korean (EUC) - euc-kr</option>
    <option value="iso-2022-kr" <?php echo $modx_charset=="iso-2022-kr" ? "selected='selected'" : "" ; ?> >Korean (ISO) - iso-2022-kr</option>
    <option value="Johab" <?php echo $modx_charset=="Johab" ? "selected='selected'" : "" ; ?> >Korean (Johab) - Johab</option>
    <option value="x-mac-korean" <?php echo $modx_charset=="x-mac-korean" ? "selected='selected'" : "" ; ?> >Korean (Mac) - x-mac-korean</option>
    <option value="x-IA5-Norwegian" <?php echo $modx_charset=="x-IA5-Norwegian" ? "selected='selected'" : "" ; ?> >Norwegian (IA5) - x-IA5-Norwegian</option>
    <option value="IBM437" <?php echo $modx_charset=="IBM437" ? "selected='selected'" : "" ; ?> >OEM United States - IBM437</option>
    <option value="x-IA5-Swedish" <?php echo $modx_charset=="x-IA5-Swedish" ? "selected='selected'" : "" ; ?> >Swedish (IA5) - x-IA5-Swedish</option>
    <option value="windows-874" <?php echo $modx_charset=="windows-874" ? "selected='selected'" : "" ; ?> >Thai (Windows) - windows-874</option>
    <option value="ibm857" <?php echo $modx_charset=="ibm857" ? "selected='selected'" : "" ; ?> >Turkish (DOS) - ibm857</option>
    <option value="x-mac-turkish" <?php echo $modx_charset=="x-mac-turkish" ? "selected='selected'" : "" ; ?> >Turkish (Mac) - x-mac-turkish</option>
    <option value="unicode" <?php echo $modx_charset=="unicode" ? "selected='selected'" : "" ; ?> >Unicode - unicode</option>
    <option value="unicodeFFFE" <?php echo $modx_charset=="unicodeFFFE" ? "selected='selected'" : "" ; ?> >Unicode (Big-Endian) - unicodeFFFE</option>
    <option value="UTF-7" <?php echo $modx_charset=="UTF-7" ? "selected='selected'" : "" ; ?> >Unicode (UTF-7) - utf-7</option>
    <option value="us-ascii" <?php echo $modx_charset=="us-ascii" ? "selected='selected'" : "" ; ?> >US-ASCII - us-ascii</option>
    <option value="ibm850" <?php echo $modx_charset=="ibm850" ? "selected='selected'" : "" ; ?> >Western European (DOS) - ibm850</option>
    <option value="x-IA5" <?php echo $modx_charset=="x-IA5" ? "selected='selected'" : "" ; ?> >Western European (IA5) - x-IA5</option>
    <option value="macintosh" <?php echo $modx_charset=="macintosh" ? "selected='selected'" : "" ; ?> >Western European (Mac) - macintosh</option>
</optgroup>
