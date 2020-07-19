<%
    result = ""

    set xmlhttp = server.CreateObject("MSXML2.ServerXMLHTTP")
    url = "http://www.ntreis.immobel.com/personal/1/searchResults.do"
    url = url & "?glexMarket="
    url = url & "&la=EN"
    url = url & "&per=JessEasley"
    url = url & "&shcu="
    url = url & "&mode=std"
    url = url & "&rpp=15"
    url = url & "&c_sort=li_sort_priced"
    url = url & "&c_location=flower+mound"
    url = url & "&c_itype=1"
    url = url & "&minprice=250000"
    url = url & "&maxprice=400000"
    url = url & "&cu=USD"
    url = url & "&minbedroom=4"
    url = url & "&minbathroom=2"
    url = url & "&minsurface="
    url = url & "&maxsurface="
    url = url & "&c_surface_mu=1"
    url = url & "&minlsurface="
    url = url & "&maxlsurface="
    url = url & "&c_lsurface_mu=1"
    url = url & "&c_mls="
    'url = "http://google.com"
    xmlhttp.open "GET",url,false
    xmlhttp.onreadystatechange = GetRef("objXML_onreadystatechange")
    xmlhttp.send()
    result = result & "<br><br><a href='" & url & "'>web site</a><br><br>"
    response.Write result

Function objXML_onreadystatechange()
    If (xmlhttp.readyState = 4) Then
        If (xmlhttp.status = 200) Then
            result = result & xmlhttp.responseText
            Set xmlhttp = Nothing
        else
            result = result & "ready status: " & xmlhttp.status & "<br>"
        End If
    else
        result = result & "ready state: " & xmlhttp.readyState & "<br>"
    End If
End Function
'http://www.ntreis.immobel.com/img/369026/1f/12/134655856_1.jpg
%>
