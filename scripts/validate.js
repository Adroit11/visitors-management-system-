    function validate(form){
        var returnValue=true;
        var ID=frmRegister.idnumb.value;
        
        
            if (ID.length<3){
                returnValue=false;
                alert("your Firstname must be at least\n 3 characters long.\n please try again.")
                frmRegister.idnumb.focus();
            }
            
           
             
    //return returnValue
    if (returnValue==true) {return capture();}
    else {return false;}
}

function capture(){
	var err, payload

	try // Exception handling
	{
		// Open device. [AUTO_DETECT]
		// You must open device before enrollment.
                //set parameters
		DEVICE_FDP02		= 1;
		DEVICE_FDU02		= 2;
		DEVICE_FDU03		= 3;
		DEVICE_FDU04		= 4;
		DEVICE_AUTO_DETECT	= 255;
                
                // You must open device before enrollment.
		document.objSecuBSP.OpenDevice(DEVICE_AUTO_DETECT);
		err = document.objSecuBSP.ErrorCode;	// Get error code


		err = document.objSecuBSP.ErrorCode;	// Get error code
	
		if ( err != 0 )	// Device open failed
		{
			alert('Device Initiation failed !');
			return(false);
		}
	
		// Capture user's fingerprint.
		document.objSecuBSP.Capture();
		err = document.objSecuBSP.ErrorCode;	// Get error code
	
		if ( err != 0 )		// Enroll failed
		{
			alert('Capture failed ! Error Number : [' + err + ']');
			document.objSecuBSP.CloseDevice(DEVICE_AUTO_DETECT);
			return(false);
		}
		else	// Capture success
		{
			// Get text encoded FIR data from SecuBSP module.
			document.frmRegister.firtext.value = document.objSecuBSP.FIRTextData;
		}
	
		// Close device. [AUTO_DETECT]
		document.objSecuBSP.CloseDevice(DEVICE_AUTO_DETECT);

	}
	catch(e)
	{
		alert(e.message);
		return(false);
	}
	
	// Submit main form
	document.frmRegister.submit();
	return true;
}