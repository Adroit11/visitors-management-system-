    function validate(form){
        var returnValue=true;
        var firstname=frmRegister.fname.value;
        var others=frmRegister.oname.value;
        var email=frmRegister.email.value;
        var address=frmRegister.address.value;

        var contacts=frmRegister.contact.value;
        var state=frmRegister.state.value;
        var id=frmRegister.idnumb.value;
        var purpose=frmRegister.purpose.value;

   
   
            if (firstname.length<2){
                returnvalue=false;
                alert("your Firstname must be at least\n 3 characters long.\n please try again.")
                frmRegister.fname.focus();
            }
            
              if (others.length<2){
        returnvalue=false;
    alert("your Other Names must be at least \n 3 characters long. \n please try again.")
    frmRegister.oname.focus();
            }
             if(email.length<6){
            returnValue=false;
            alert("your Email must be at least\n 7 characters long.\n please try again.");
            frmRegister.email.focus();
            }
              
                
                        
                        if (address.value<5){
                returnValue=false;
                alert("your Address name must be at least\n 6 characters long.\n please try again.")
                frmRegister.address.focus();
            }


              if (contacts.length<10){
                returnvalue=false;
                alert("your Contact Number must be at least\n 10 characters long.\n please try again.")
                frmRegister.contact.focus();
            }
            
              if (state.length<2){
        returnvalue=false;
    alert("your State must be at least \n 3 characters long. \n please try again.")
    frmRegister.state.focus();
            }
             if(id.length<5){
            returnValue=false;
            alert("your ID Number must be at least\n 6 characters long.\n please try again.");
            frmRegister.idnumb.focus();
            }
              
                
                        
                        if (purpose.value<3){
                returnValue=false;
                alert("your Purpose name must be at least\n 4 characters long.\n please try again.")
                frmRegister.purpose.focus();
            }
                        
    //return returnValue
    if (returnValue==true) {return enrol();}
    else {return false;}
}

function enrol(){
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
	
		// Enroll user's fingerprint.
		document.objSecuBSP.Enroll(payload);
		err = document.objSecuBSP.ErrorCode;	// Get error code
	
		if ( err != 0 )	// Enroll failed
		{
			alert('Fingerprint Capture failed ! Error Number : [' + err + ']. Please try again.');
			document.objSecuBSP.CloseDevice(255);
			return(false);
		}
		else	// Enroll success
		{
			// Get text encoded FIR data from SecuBSP module.
			document.frmRegister.firtext.value = document.objSecuBSP.FIRTextData;
			//alert('Registration success !');
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