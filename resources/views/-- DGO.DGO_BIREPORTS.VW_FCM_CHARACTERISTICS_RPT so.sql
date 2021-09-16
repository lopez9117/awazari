-- DGO.DGO_BIREPORTS.VW_FCM_CHARACTERISTICS_RPT source

CREATE OR REPLACE VIEW VW_FCM_CHARACTERISTICS_RPT (                                                            
 METER_NUMBER_INDEX                       COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.METER_NUMBER_INDEX'                
,TIME_STAMP                               COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TIME_STAMP'                        
,SEQUENCE_NUMBER                          COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.SEQUENCE_NUMBER'                   
,END_TIME_STAMP                           COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.END_TIME_STAMP'                    
,EFFECTIVE_DATE                           COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.EFFECTIVE_DATE'  
,GAS_DATE                                 COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TIME_STAMP offset by 16 hours and transformed to date'
,EFFECTIVE_END_DATE                       COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.EFFECTIVE_END_DATE'
,GAS_END_DATE                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.END_TIME_STAMP offset by 16 hours and transformed to date'
,DURATION                                 COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.DURATION'                          
,GMS_DATE                                 COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.GMS_DATE'                                    
,PLATE_SIZE                               COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.ORIFICE_PLATE_DIAMETER'            
,PLATE_REF_TEMP                           COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.ORIFICE_REF_TEMP'                  
,PLATE_MTERIAL                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.ORIFICE_PLATE_MATERIAL'            
,K_FACTOR                                 COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.K_FACTOR'                                            
,PIPE_DIAMETER                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TUBE_DIAMETER'                                         
,PIPE_MATERIAL                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TUBE_MATERIAL'                                      
,ATMOSPHERIC_PRESSURE                     COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.ATMOSPHERIC_PRESSURE'                                      
,PRESSURE_BASE                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.PRESSURE_BASE'                     
,TEMPERATURE_BASE                         COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TEMPERATURE_BASE'                                       
,CONTRACT_DAY                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.CONTRACT_DAY'                      
,CONTRACT_HOUR                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.CONTRACT_HOUR'                     
,CALCULATION_METHOD                       COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.CALCULATION_METHOD'                
,FPV_METHOD                               COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.FPV_METHOD'                                              
,STATIC_PRESSURE_TYPE                     COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.STATIC_PRESSURE_TYPE'                                                 
,LIVE_TEMPERATURE                         COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.LIVE_TEMPERATURE'                  
,METER_TYPE                               COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.METER_TYPE'  
,METER_CLASS                              COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.METER_CLASS'                                    
,CUTOFF_ALARM                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.CUTOFF_ALARM'                      
,DP_RANGE_HIGH                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.DP_RANGE_HIGH'                     
,DP_RANGE_LOW                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.DP_RANGE_LOW'                                         
,DP_ALARM_HIGH                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.DP_ALARM_HIGH'                     
,DP_ALARM_LOW                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.DP_ALARM_LOW'                                       
,SP_RANGE_HIGH                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.SP_RANGE_HIGH'                     
,SP_RANGE_LOW                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.SP_RANGE_LOW'                                           
,SP_ALARM_HIGH                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.SP_ALARM_HIGH'                     
,SP_ALARM_LOW                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.SP_ALARM_LOW'                      
,TEMP_RANGE_HIGH                          COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TEMP_RANGE_HIGH'                   
,TEMP_RANGE_LOW                           COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TEMP_RANGE_LOW'                                         
,TEMP_ALARM_HIGH                          COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TEMP_ALARM_HIGH'                   
,TEMP_ALARM_LOW                           COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TEMP_ALARM_LOW'
,DATA_RESOLUTION                          COMMENT 'FLOWCAL.FC_METER_CHARACTERISTIC.DATA_RESOLUTION'
,DATA_SPAN                                COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.DATA_SPAN'                                         
,PRESSURE_COMPENSATED                     COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.PRESSURE_COMPENSATED'              
,TEMPERATURE_COMPENSATED                  COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.TEMPERATURE_COMPENSATED'                            
,METER_STATUS                             COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.METER_STATUS'                                    
,METER_DIRECTION_INDEX                    COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.METER_DIRECTION_INDEX'
,METER_CLASS_INDEX                        COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.METER_CLASS_INDEX' 
--,METER_DIRECTION                        COMMENT 'FLOWCAL.FC_METER_DIRECTION.USER_LABEL'
--,BASE_DIRECTION                         COMMENT 'FLOWCAL.FC_METER_DIRECTION.BASE_DIRECTION'                   
,PRODUCT_INDEX                            COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.PRODUCT_INDEX' 
,NUMBER_OF_DIALS                          COMMENT 'FLOWCAL.FCM_CHARACTERISTIC.NUMBER_OF_DIALS' --v1.07 added column
--,PRODUCT_NAME                           COMMENT 'FLOWCAL.FC_PRODUCT.NAME'                       
,"Module Source Code"                     COMMENT 'Static Value = FC' 
) AS (

--v1.03 Added cte's for EXISTS query in the WHERE clause to filter down to the correct Max Time_Stamp for each GasDay and Minimum Sequence Number for each Time Stamp
--v1.06 changed Effective_Date to GasDay for a more precise characteristic record
--v1.06 Used a -16 hour offset to find GasDay from Time_Stamp because Time_Stamps in flowcal are 6 hours ahead and Gas Days run from 10 am to 10 pm
With 
    MaxTS AS
        (SELECT 
             e.Meter_Number_Index
            ,TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(e.Time_Stamp))) as GasDay 
            ,MAX(e.Time_Stamp) as TimeStamp
         FROM DGO.FLOWCAL.FC_METER_CHARACTERISTIC e
         group by e.Meter_Number_Index, TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(e.Time_Stamp)))
        ),

    MinSN AS
        (SELECT 
            Meter_Number_Index
           ,Time_Stamp
           ,MIN(Sequence_Number) as SequenceNumber
         from DGO.FLOWCAL.FC_METER_CHARACTERISTIC
         group by Meter_Number_Index, Time_Stamp),
        
    Overlap AS
--v1.04 Created Overlap CTE to identify erroneous flowcal data. This query uses the MinSN and MaxTS Cte's to find the last record by day and then compares date ranges for each Meter number and identifies records that have date ranges that overlap other records of the same meter.
--v1.04 Before the aggregations in this query, the results would be the regular meter data from characteristics (c1) along with the overlap record data from the join (c2), we then aggregate to have one record for the overlap as well as the next time stamp and effective date (it is the least value so we use Min), we will later use these as replacements
--v1.04 Keys to join to the characteristics table in the final select are Meter_Number_index, BadTimeStamp, and BadEndTimeStamp
--v1.06 Changed BadDate, BadEndDate, and NewEndDate to be date transformations based on the Time_Stamp to line everything up by Gas Day and not Effective_Date
        (SELECT
            c1.Meter_Number_Index
            ,c2.Time_Stamp as BadTimeStamp --v1.04 Time stamp of the overlap record
            ,c2.End_Time_Stamp as BadEndTimeStamp --v1.04 End time stamp of the overlap record
            ,TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(c2.Time_Stamp))) as BadDate --v1.06 Gas_Date of the overlap record for comparison
            ,TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(c2.End_Time_Stamp))) as BadEndDate --v1.06 Gas_End_Date of the overlap record for comparison
            ,COUNT(c1.Meter_Number_index) as AffectedRecords --v1.04 Count of the records affected by the overlapped date range
            ,MIN(TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(c1.Time_Stamp)))) as NewEndDate --v1.05 We will use this gas date to replace the bad Gas_End_Date that is on the overlap record
            ,Min(c1.Time_Stamp) as NewEndTimeStamp --v1.04 We will use this time stamp to replace the bad End_Time_Stamp that is on the overlap record
         from DGO.FLOWCAL.FC_METER_CHARACTERISTIC c1
         inner join
            (SELECT
                Meter_Number_Index
                ,Time_Stamp
                ,End_Time_Stamp
                ,Effective_Date
                ,Effective_End_Date
             from DGO.FLOWCAL.FC_METER_CHARACTERISTIC a
             where EXISTS --v1.04 - have to use Exists with MaxTS and MinSN to work with one characteristic for each day, if we didn't we would return a lot of overlaps that would not be correct 
                (SELECT 1
                from MaxTS x
                inner join MinSN y
                    ON y.Meter_Number_Index = x.Meter_Number_Index
                        AND y.Time_Stamp = x.TimeStamp
                where x.Meter_Number_Index = a.Meter_Number_index
                    and x.TimeStamp = a.Time_Stamp
                    and y.SequenceNumber = a.Sequence_Number)
            ) c2
            ON c2.Meter_Number_Index = c1.Meter_Number_index
                AND --v1.05 There are two different overlapping scenarios, but both of these  have to be for characteristics with the same Meter_Number_Index
                    (--v1.05 Scenario One - The time_stamp and End_time_stamp of a characteristic is sandwiched between the time stamps of another characteristic 
                        (c1.Time_Stamp >= c2.Time_Stamp
                        AND
                        c1.End_Time_Stamp > c2.Time_Stamp 
                        AND
                        c1.End_Time_Stamp < c2.End_Time_Stamp)
                      OR
                      --v1.05 Scenario 2 - The time_stamp of the first characteristic is sandwiched between the time stamps of the second characteristic but the End_Time_Stamp of the first characteristic is greater than the End_Time_Stamp of the second
                        (c1.Time_Stamp > c2.Time_Stamp
                        AND
                        c1.Time_Stamp < c2.End_Time_Stamp
                        AND
                        c1.End_Time_Stamp >= c2.End_Time_Stamp)
                    )
         where EXISTS --v1.04 - have to use Exists with MaxTS and MinSN to work with one characteristic for each day, if we didn't we would return a lot of overlaps that would not be correct 
            (SELECT 1
             from MaxTS x
             inner join MinSN y
                ON y.Meter_Number_Index = x.Meter_Number_Index
                    AND y.Time_Stamp = x.TimeStamp
             where x.Meter_Number_Index = c1.Meter_Number_index
                and x.TimeStamp = c1.Time_Stamp
                and y.SequenceNumber = c1.Sequence_Number)
          group by c1.Meter_Number_index, c2.Time_Stamp, c2.End_Time_Stamp
                ,TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(c2.Time_Stamp)))
                ,TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(c2.End_Time_Stamp)))
        
        )

SELECT      fcm.METER_NUMBER_INDEX
              ,fcm.TIME_STAMP
              ,fcm.SEQUENCE_NUMBER
              ,CASE
                WHEN o.NewEndTimeStamp IS NULL THEN fcm.End_Time_Stamp
                WHEN o.NewEndTimeStamp IS NOT NULL THEN o.NewEndTimeStamp
                ELSE NULL END
               as END_TIME_STAMP --v1.04 Case statement used to replace error End_Time_Stamp with new End_Time_Stamp to get rid of the overlapping date range
              ,fcm.EFFECTIVE_DATE
              ,TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(fcm.Time_Stamp))) as GasDate --v1.06 Added GasDate as column in the final select, Effective_Date and Gas_Date will sometimes be different because of the -16 hour offset
              ,CASE
                WHEN o.NewEndDate IS NULL THEN fcm.Effective_End_Date
                WHEN o.NewEndDate IS NOT NULL THEN o.NewEndDAte
                ELSE NULL END
               as EFFECTIVE_END_DATE --v1.04 Case statement used to replace error Effective_End_Date with new Effective_End_Date to get rid of the overlapping date range
              ,CASE
                WHEN o.NewEndDate IS NULL THEN TO_DATE(DATEADD(hour, -16, TO_TIMESTAMP(fcm.End_Time_Stamp)))
                WHEN o.NewEndDate IS NOT NULL THEN o.NewEndDate
                ELSE NULL END as GasEndDate --v1.06 Added Gas_End_Date in the final select, Effective_End_Date and Gas_End_Date will sometimes be different because of the -16 hour offset
              ,fcm.DURATION
              ,fcm.GMS_DATE                                     
              ,fcm.ORIFICE_PLATE_DIAMETER       
              ,fcm.ORIFICE_REF_TEMP                                      
              ,CASE fcm.ORIFICE_PLATE_MATERIAL
                  WHEN 'C' THEN 'Carbon Steel'
                  WHEN 'S' THEN 'Stainless Steel'
                  WHEN 'M' THEN 'Monel'
                END AS PlateMaterial
              ,fcm.K_FACTOR                                                                                                 
              ,fcm.TUBE_DIAMETER                                                                  
              ,CASE fcm.TUBE_MATERIAL
                  WHEN 'C' THEN 'Carbon Steel'
                  WHEN 'S' THEN 'Stainless Steel'
                  WHEN 'M' THEN 'Monel'
                END AS TubeMaterial           
              ,fcm.ATMOSPHERIC_PRESSURE                                                           
              ,fcm.PRESSURE_BASE                                                 
              ,fcm.TEMPERATURE_BASE                                                                
              ,fcm.CONTRACT_DAY                                                   
              ,fcm.CONTRACT_HOUR                                                
              ,CASE fcm.CALCULATION_METHOD                                    
                    WHEN '0' THEN 'AGA3 1985'
                    WHEN '1' THEN 'AGA3 1992'         
                    WHEN '7' THEN 'AGA7'              
                    WHEN '5' THEN 'AGA5'              
                    WHEN 'V' THEN 'VCONE'             
                    WHEN 'M' THEN 'MASS METER'        
                    WHEN 'F' THEN 'FLOW DENSITY'      
                    WHEN 'C' THEN 'AGA10/AGA11'       
                    WHEN 'CALC_AGA11' THEN 'CORIOLIS' 
                    WHEN 'I' THEN 'LINEPACK'      
                    WHEN 'S' THEN 'ISO5167'           
                    WHEN 'A' THEN 'API'               
                    WHEN 'B' THEN 'API INFERRED MASS' 
                    WHEN 'D' THEN 'API DIRECT MASS'   
                    WHEN 'E' THEN 'ORIFICE DATA ONLY' 
                    WHEN '3' THEN 'API ORIFICE'       
                    WHEN '4' THEN 'API ORIFICE GSV'   
                    ELSE fcm.CALCULATION_METHOD 
                 END AS CalculationMethod
              , CASE fcm.FPV_METHOD
                    WHEN 'N' THEN 'NX-19'
                    WHEN 'D' THEN 'AGA8-DETAIL'
                    WHEN '1' THEN 'AGA8-GM1'
                    WHEN '2' THEN 'AGA8-GM2'
                    ELSE fcm.FPV_METHOD 
                  END AS FPVMethod
              ,CASE fcm.STATIC_PRESSURE_TYPE
                    WHEN 'G' THEN 'GAUGE'
                    WHEN 'A' THEN 'ABSOLUTE'
                 END AS StaticPressureType
              ,fcm.LIVE_TEMPERATURE                                     
              ,CASE fcm.METER_TYPE
                  WHEN 'O' THEN 'ORIFICE'
                  WHEN 'P' THEN 'POSITIVE DISPLACEMENT'
                  WHEN 'E' THEN 'CONE'
                  WHEN 'V' THEN 'VORTEX'
                  WHEN 'L' THEN 'LINE PACK'
                  WHEN 'U' THEN 'ULTRASONIC'
                  WHEN 'T' THEN 'TURBINE'
                  WHEN 'C' THEN 'CORIOLIS'
                  ELSE fcm.METER_TYPE 
                 END AS MeterType
              ,fcm.METER_CLASS                                                              
              ,fcm.CUTOFF_ALARM                                                
              ,fcm.DP_RANGE_HIGH                                            
              ,fcm.DP_RANGE_LOW                                                              
              ,fcm.DP_ALARM_HIGH                                             
              ,fcm.DP_ALARM_LOW                                                               
              ,fcm.SP_RANGE_HIGH                                             
              ,fcm.SP_RANGE_LOW                                                               
              ,fcm.SP_ALARM_HIGH                                           
              ,fcm.SP_ALARM_LOW                                              
              ,fcm.TEMP_RANGE_HIGH                                          
              ,fcm.TEMP_RANGE_LOW                                                                  
              ,fcm.TEMP_ALARM_HIGH                                    
              ,fcm.TEMP_ALARM_LOW
              ,CASE fcm.DATA_RESOLUTION 
                    WHEN 72 THEN 'Hourly'
                    WHEN 68 THEN 'Daily'
                    WHEN 70 THEN '15Min' --v1.08 - Added 70 and 77 to case statement
                    WHEN 77 THEN 'Monthly'
                    ELSE 'Other'
                 END AS Data_Resolution -- v1.02 -- Changed column name from Record_Resolution to Data_Resolution
              ,CASE fcm.DATA_SPAN --v1.08 - added case statement to give full names of values
                    WHEN 'L' THEN 'Leads'
                    WHEN 'T' THEN 'Trails'
               END as DATA_SPAN
              ,fcm.PRESSURE_COMPENSATED                                  
              ,fcm.TEMPERATURE_COMPENSATED                                           
              ,CASE fcm.METER_STATUS 
                    WHEN 'A' THEN 'ACTIVE'
                    WHEN 'D' THEN 'DISCONNECTED'
                    WHEN 'T' THEN 'TEMPORARILY DEACTIVATED'
                    WHEN 'X' THEN 'NON-EXISTENT' --v1.08 - added X to case statement
                 END AS MeterStatus
              ,CASE fcm.METER_DIRECTION_INDEX                      
                    WHEN -1 THEN 'Balance Check'
                    WHEN -2 THEN 'Tieover'     
                    WHEN -3 THEN 'Transfer'     
                    WHEN -4 THEN 'Positive'     
                    WHEN -5 THEN 'Negative'     
                    WHEN -101 THEN 'Inlet'      
                    WHEN -102 THEN 'Outlet'     
                    WHEN -103 THEN 'Throughput' 
                    WHEN -104 THEN 'Off System' 
                    WHEN -105 THEN 'Both'
                  END AS FlowDirection
              --,METER_CLASS                             
              ,CASE fcm.METER_CLASS_INDEX                    
                    WHEN 53 THEN 'Compressor Fuel'
                    WHEN 54 THEN 'Plant Flare'
                    WHEN 55 THEN 'Fuel Gas'
                    WHEN 56 THEN 'Transportation Delivery'
                    WHEN 57 THEN 'Gas Receipts'
                    WHEN 51 THEN 'Check'
                    WHEN 52 THEN 'Custody'
                    WHEN 59 THEN 'Audit'
                    WHEN 60 THEN 'Equity Wellhead'
                    WHEN 61 THEN 'Fuel'
                    WHEN 62 THEN 'Interconnect'
                    WHEN 63 THEN 'NonOp Interconnect'
                    WHEN 64 THEN 'Operations'
                    WHEN 65 THEN 'Third Party'
                    WHEN 58 THEN 'Domestic'
                    WHEN 66 THEN 'Bulk and Test'
                 END AS MeterClassIndex
              --,METER_DIRECTION                        
              --,BASE_DIRECTION                                            
              ,CASE fcm.PRODUCT_INDEX                            
                  WHEN 0 THEN 'Total Fluid'
                  WHEN 11649835 THEN 'Light Hydrocarbons'
                  WHEN 263193322 THEN 'Water'
                END AS ProductIndex
              ,fcm.NUMBER_OF_DIALS
              --,PRODUCT_NAME                                         
              ,'FC'
              
     from DGO.FLOWCAL.FC_METER_CHARACTERISTIC fcm
--v1.04 Left joining to the Overlap CTE to identify error records and using above case statements to correct the Effective_End_Date and End_Time_Stamp
     left join Overlap o
        ON o.Meter_Number_Index = fcm.Meter_Number_Index
        and o.BadTimeStamp = fcm.Time_Stamp --v1.04 using these time stamps to identify the records that are causing the problems, time_stamp is more precise than effective_date
        and o.BadEndTimeStamp = fcm.End_Time_Stamp
  --v1.03 replaced old sub-queries in the where clause with 1 consolidated Exists and changed logic to rely on minimum Sequence_Number and max Time_Stamp, not End_Time_Stamp
  --v1.03 Logic - in order to find one record per day, we want the record with the Max Time_Stamp for each Effective_Date and Minimum Sequence Number for each Time Stamp
   where EXISTS
            (SELECT 1
             from MaxTS x
             inner join MinSN y
                ON y.Meter_Number_Index = x.Meter_Number_Index
                    AND y.Time_Stamp = x.TimeStamp
             where x.Meter_Number_Index = fcm.Meter_Number_index
                and x.TimeStamp = fcm.Time_Stamp
                and y.SequenceNumber = fcm.Sequence_Number)
);